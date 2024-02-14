<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cart-item {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .item-details {
            flex-grow: 1;
        }
        .item-details h3 {
            margin-bottom: 5px;
        }
        .item-details p {
            margin: 0;
            font-weight: bold;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
    </style>
</head>
<body>
    <!-- Шапка -->
    @include('_header')

    <div class="container mt-4">
        <h1>Корзина покупок</h1>

        @if (empty($cart))
            <p>Ваша корзина пуста.</p>
        @else
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($cart as $productId => $item)
                <div class="cart-item">
                    <div class="item-details">
                        <h3><a href="{{ route('product.show', ['product' => $productId]) }}">{{ $item['name'] }}</a></h3>
                        <p>Цена: <span class="text-success">{{ $item['price'] }} руб</span></p>
                        <p>Количество: {{ $item['quantity'] }}</p>
                    </div>
                    <div class="btn-container">
                        <form action="{{ route('cart.remove', ['product_id' => $productId]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
                @php
                    $totalPrice += $item['price'] * $item['quantity'];
                @endphp
            @endforeach

            <div class="mt-3">
                <h3>Итоговая сумма покупки: {{ $totalPrice }} руб</h3>
            </div>

            <div class="mb-3">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Очистить корзину</button>
                </form>
            </div>
        @endif
    </div>

    <!-- Подвал -->
    @include('_footer')
</body>
</html>

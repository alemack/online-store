<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Переопределение стилей для внешнего вида корзины */
        .cart-item {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <!-- Включение шапки сайта -->
    @include('_header')

    <div class="container mt-4">
        <h1>Корзина покупок</h1>

        @if (empty($cart))
            <p>Ваша корзина пуста.</p>
        @else
            @foreach ($cart as $productId => $item)
                <div class="cart-item">
                    <h3>{{ $item['name'] }}</h3>
                    <p>Цена: ${{ $item['price'] }}</p>
                    <p>Количество: {{ $item['quantity'] }}</p>
                    <div class="btn-container">
                        <form action="{{ route('product.show', ['product' => $productId]) }}" method="GET">
                            <button type="submit" class="btn btn-info">Посмотреть</button>
                        </form>
                        {{-- <form action="{{ route('cart.remove', ['product_id' => $productId]) }}" method="POST">
                            @csrf --}}
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        {{-- </form> --}}
                    </div>
                </div>
            @endforeach

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Очистить корзину</button>
            </form>
        @endif
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-price {
            position: absolute;
            top: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: larger;
        }
        .input-quantity {
            max-width: 80px;
        }
    </style>
</head>
<body>
    <!-- Включение шапки сайта -->
    @include('_header')

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Включение колонки с категориями товаров -->
            <div class="col-md-3">
                @include('_category-filter')
            </div>

            <!-- Содержимое страницы (карточки товаров) -->
            <div class="col-md-9">
                <!-- Выводим карточки дешевых товаров -->
                @foreach($cheapProducts as $product)
                <div class="row mb-4">
                    <div class="col-md-3">
                        <!-- Отображаем только первое изображение товара -->
                        @if ($product->images->isNotEmpty())
                        <img src="{{ asset('images/' . $product->images->first()->image_url) }}" class="card-img-top" alt="Product Image">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Product Image">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="card position-relative">
                            <span class="card-price">{{ $product->price }} руб</span>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('product.show', $product->id) }}" class="text-dark">{{ $product->name }}</a>
                                </h5>
                                <p>В наличии: {{ $product->remainder }}</p>
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->remainder }}" class="form-control input-quantity mb-2"> <!-- Поле для ввода кол-ва-->
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </form>
                                @if ($errors->has('quantity'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('quantity') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-3">
                    {{ $cheapProducts->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('_footer')
</body>
</html>

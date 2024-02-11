<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <!-- Включение шапки сайта -->
        @include('_header')

        <div class="container mt-4">
            <div class="row">
                <!-- Включение колонки с категориями товаров -->
                @include('_categories')

                <!-- Содержимое страницы (карточки товаров) -->
                <div class="col-md-9">
                    <div class="row">
                        <!-- Выводим карточки дешевых товаров -->
                        @foreach($cheapProducts as $product)
                        <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Отображаем только первое изображение товара -->
                        @if ($product->images->isNotEmpty())
                        <img src="{{ asset('images/' . $product->images->first()->image_url) }}" class="card-img-top" alt="Product Image">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Product Image">
                        @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                {{-- <p class="card-text">Description: {{ $product->description }}</p> --}}
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </body>
</html>

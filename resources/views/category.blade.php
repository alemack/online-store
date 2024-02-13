<!-- category.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }}</title>
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
        .product-details {
            padding: 10px;
        }
        .card-img-top {
            max-width: 250px; /* Уменьшение размера изображения */
        }
        .input-quantity {
            max-width: 60px; /* Уменьшение размера поля ввода */
        }
    </style>
</head>
<body>
    <!-- Включение шапки сайта -->
    @include('_header')

    <div class="container mt-4">
        <h1>{{ $category }}</h1>
        <!-- Выводим карточки товаров -->
        @foreach($cheapProducts as $product)
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Отображаем только первое изображение товара -->
                                <div class="position-relative">
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('images/' . $product->images->first()->image_url) }}" class="card-img-top" alt="Product Image">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Product Image">
                                    @endif
                                    {{-- <span class="card-price">{{ $product->price }} руб</span> --}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-details">
                                    <span class="card-price">{{ $product->price }} руб</span>
                                    <h5 class="card-title">
                                        <a href="{{ route('product.show', $product->id) }}" class="text-dark">{{ $product->name }}</a>
                                    </h5>
                                    {{-- <h5 class="card-title">{{ $product->name }}</h5> --}}
                                    <p class="card-text">В наличии: {{ $product->remainder }}</p>
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->remainder }}" class="form-control mb-2 input-quantity">
                                        <button type="submit" class="btn btn-primary">Купить</button>
                                    </form>
                                    @if ($errors->has('quantity'))
                                        <div class="alert alert-danger mt-2">
                                            {{ $errors->first('quantity') }}
                                        </div>
                                    @endif
                                    {{-- <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Посмотреть</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-3">
            {{ $cheapProducts->links() }}
        </div>
    </div>

    <!-- Включение футера -->
    @include('_footer')

    <!-- Подключение скриптов Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

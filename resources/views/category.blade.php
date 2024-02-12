<!-- category.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }}</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Включение шапки сайта -->
    @include('_header')

    <div class="container mt-4">
        <h1>{{ $category }}</h1>
        <div class="row">
            <!-- Выводим карточки товаров -->
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
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="quantity" value="1" min="1"> <!-- Поле для ввода кол-ва-->
                                <button type="submit" class="btn btn-primary">Купить</button>
                            </form>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Посмотреть</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            max-height: 500px;
            width: 100%;
            object-fit: cover;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .product-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .price-and-quantity {
            margin-bottom: 20px;
        }
        .product-description {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Включение шапки сайта -->
    @include('_header')

    <div class="container">
        <div>
            <h1 class="product-title">{{ $product->name }}</h1>
        </div>


        <div class="row">
            <div class="col-md-6">

                <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($product->images as $key => $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($product->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/' . $image->image_url) }}" class="d-block w-100" alt="Product Image">
                            </div>
                        @endforeach

                        @if ($product->images->isEmpty())
                            <div class="carousel-item active">
                                <img src="{{ asset('images/default.jpg') }}" class="d-block w-100" alt="Default Product Image">
                            </div>
                        @endif

                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>


                </div>

            </div>

            <div class="col-md-6">
                <div class="price-and-quantity">
                    <p class="price">Цена: {{ $product->price }} руб</p>
                    <p>В наличии: {{ $product->remainder }} единиц</p>
                    <p>Категория:
                        @foreach($product->categories as $category)
                            {{ $category->name }},
                        @endforeach
                    </p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
                        <button type="submit" class="btn btn-primary">Купить</button>
                    </form>
                </div>
            </div>

        </div>

        <div>
            <h2 class="description-title">Описание</h2>
            <p class="product-description">{{ $product->description }}</p>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('_footer')
</body>
</html>

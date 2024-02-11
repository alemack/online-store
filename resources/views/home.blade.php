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
    <div class="container">
        <h1>Welcome to our store</h1>

        <img src="{{ asset('images/' . $image->image_url) }}" class="img-fluid" alt="Product Image">

        <p>Product Name: {{ $image->product->name }}</p>
        <p>Price: ${{ $image->product->price }}</p>
        <p>Description: {{ $image->product->description }}</p>
        <p>Stock: {{ $image->product->remainder }}</p>
    </div>
</body>
</html>

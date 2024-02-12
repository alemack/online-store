<!-- _header.blade.php -->
<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Online Store</a>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control mr-2" placeholder="Поиск">
            <a href="{{ route('cart.show') }}" class="btn btn-outline-light mr-2">Корзина</a>
            <button class="btn btn-outline-light">Аккаунт</button>
        </div>
    </div>
</header>

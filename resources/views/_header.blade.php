<!-- _header.blade.php -->
<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Online Store</a>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control mr-2" placeholder="Search">
            <a href="{{ route('cart.show') }}" class="btn btn-outline-light mr-2">Cart</a>
            <button class="btn btn-outline-light">Account</button>
        </div>
    </div>
</header>

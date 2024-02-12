<!-- _category-filter.blade.php -->
<form action="{{ route('category') }}" method="GET">
    <select name="category">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->name }}" {{ $category->name == $category ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>




{{--
<form action="{{ route('category', ['category' => $selectedCategory]) }}" method="GET">
    <select name="category">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->name }}" {{ $selectedCategory == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form> --}}



{{-- <div class="col-md-3">
    <h2>Categories</h2>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">{{ $category->name }}</li>
        @endforeach
    </ul>
</div> --}}

{{-- <div class="col-md-3">
    <h2>Categories</h2>
    <ul class="list-group">
        <li class="list-group-item">Category 1</li>
        <li class="list-group-item">Category 2</li>
        <li class="list-group-item">Category 3</li>
        <!-- Добавьте другие категории здесь -->
    </ul>
</div> --}}

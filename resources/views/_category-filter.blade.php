<!-- _category-filter.blade.php -->



<form action="{{ route('category') }}" method="GET">
    @foreach ($categories as $cat)
        <button type="submit" name="category" value="{{ $cat->name }}" class="btn btn-outline-primary mr-2">{{ $cat->name }}</button>
    @endforeach
    {{-- <butto n type="submit" name="category" value="" class="btn btn-outline-primary">Общее</butto> --}}
</form>

{{-- <form action="{{ route('category') }}" method="GET" class="mt-2">
    <select name="category" class="custom-select mr-2">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->name }}" {{ $category->name == $category ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
</form> --}}

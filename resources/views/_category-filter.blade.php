<form action="{{ route('category') }}" method="GET">
    @foreach ($categories as $cat)
        <button type="submit" name="category" value="{{ $cat->name }}" class="btn btn-outline-primary mr-2">{{ $cat->name }}</button>
    @endforeach
</form>


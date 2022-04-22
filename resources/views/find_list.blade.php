<form class="search-form" action="">
    @csrf
    <select id="area" name="area" class="search-area search">
        <option value="" selected>All area</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}">
                {{ $area->name }}
            </option>
        @endforeach
    </select> |
    <select id="area" name="area" class="search-genre search">
        <option value="">All genre</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">
                {{ $genre->name }}
            </option>
        @endforeach
    </select> |
    <div class="search-name">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text">
    </div>
</form>

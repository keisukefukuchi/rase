<form id="search__form" class="search__form search-form" action="/" method="get">
    <select id="area" name="area" class="search-area search search__input">
        <option value="0" selected>All area</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}" {{ ($area_id ?? '') == $area->id ? 'selected' : '' }}>
                {{ $area->name }}

            </option>
        @endforeach
    </select> |
    <select id="genre" name="genre" class="search-genre search search__input" >
        <option value="0">All genre</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" {{ ($genre_id ?? '') == $genre->id ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
    </select> |
    <div class="search-name">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input
        id="shop_name" class="input"
        type="text" name="shop_name"
        placeholder="Search ..."
        value="">
    </div>
</form>

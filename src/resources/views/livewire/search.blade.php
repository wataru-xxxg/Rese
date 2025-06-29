<div>
    <div class="search-container">
        <select class="filter-select" wire:model="area">
            <option value="">All area</option>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <select class="filter-select" wire:model="genre">
            <option value="">All genre</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        <input type="text" class="search-input" placeholder="Search ..." wire:model="search">
    </div>
</div>
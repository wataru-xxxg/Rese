<div class="restaurant-card">
    <div class="restaurant-image-wrapper">
        <img src="{{ asset(Storage::url($shop->image_path)) }}" alt="イメージ画像" class="restaurant-image">
    </div>
    <div class="restaurant-info">
        <h3 class="restaurant-name">{{ $shop->name }}</h3>
        <p class="restaurant-tags">#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
        <div class="card-actions">
            <a href="{{ route('detail', $shop->id) }}" class="details-btn">詳しくみる</a>
            @if (Auth::check())
            @livewire('favorite', ['shop' => $shop])
            @endif
        </div>
    </div>
</div>
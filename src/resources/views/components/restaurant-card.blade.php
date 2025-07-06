<div class="restaurant-card">
    <div class="restaurant-image-wrapper">
        <img src="{{ asset(Storage::url($shop->image_path)) }}" alt="イメージ画像" class="restaurant-image">
    </div>
    <div class="restaurant-info">
        <h3 class="restaurant-name">{{ $shop->name }}</h3>
        <p class="restaurant-tags">#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
        <div class="rating-info">
            <div class="stars">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <=$shop->average_rating)
                    <span class="star filled">★</span>
                    @else
                    <span class="star">☆</span>
                    @endif
                    @endfor
            </div>
            <span class="rating-text">{{ $shop->average_rating }}/5 ({{ $shop->review_count }}件)</span>
        </div>
        <div class="card-actions">
            @isset($isOwner)
            <a href="{{ route('owner.shops.edit', $shop->id) }}" class="edit-btn">編集</a>
            @else
            <a href="{{ route('detail', $shop->id) }}" class="details-btn">詳しくみる</a>
            @endif
            @if (Auth::check())
            @livewire('favorite', ['shop' => $shop])
            @endif
        </div>
    </div>
</div>
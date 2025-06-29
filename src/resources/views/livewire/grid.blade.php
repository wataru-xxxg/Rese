<div>
    <div class="restaurant-grid">
        @foreach ($shops as $shop)
        @include('components.restaurant-card', ['shop' => $shop])
        @endforeach
    </div>
</div>
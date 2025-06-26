<div>
    <button class="heart-btn" wire:click="toggleFavorite">
        @if ($isFavorite)
        <span class="heart-icon liked">♥</span>
        @else
        <span class="heart-icon">♡</span>
        @endif
    </button>
</div>
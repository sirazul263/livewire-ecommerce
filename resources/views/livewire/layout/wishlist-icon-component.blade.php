<div class="header-action-icon-2">
    <a href="/wishlist" wire.navigate>
        <img class="svgInject" alt="Surfside Media" src="{{ asset('/') }}assets/imgs/theme/icons/icon-heart.svg">
        @if (count($wishlist_items) > 0)
            <span class="pro-count blue">{{ count($wishlist_items) }}</span>
        @endif
    </a>
</div>

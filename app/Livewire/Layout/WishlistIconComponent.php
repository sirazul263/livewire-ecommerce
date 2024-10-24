<?php

namespace App\Livewire\Layout;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistIconComponent extends Component
{
    protected $listeners = ['refreshWishlist'=>'$refresh'];
    public function render()
    {
        $wishlist_items = Cart::instance('wishlist')->content();
        $wishlist_total = Cart::instance('wishlist')->subtotal();
        return view('livewire.layout.wishlist-icon-component', [
            'wishlist_items' => $wishlist_items,
            'wishlist_total' => $wishlist_total,
        ]);
    }
}

<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Title;
use Livewire\Component;

class WishlistComponent extends Component
{
    #[Title('Wishlist')]

    public function moveToCart($rowId){
       $item=  Cart::instance('wishlist')->get($rowId);
        Cart::instance('cart')->add($item->id, $item->name,  $item->qty, $item->price)->associate('App\Models\Product');
        Cart::instance('wishlist')->remove($rowId);
        $this->dispatch('refreshCart');
        $this->dispatch('refreshWishlist');
        flash()->success('Product has been moved to the cart successfully!');
    }

    public function removeFromWishlist($rowId){
        Cart::instance('wishlist')->remove($rowId);
        $this->dispatch('refreshWishlist');
        flash()->success('Product removed from the wishlist successfully!');
    }

    public function render()
    {
        $wishlist_items = Cart::instance('wishlist')->content();
        return view('livewire.wishlist-component', [
            'wishlist_items' => $wishlist_items
        ]);
    }
}

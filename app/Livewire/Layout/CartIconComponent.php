<?php

namespace App\Livewire\Layout;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartIconComponent extends Component
{
    protected $listeners = ['refreshCart'=>'$refresh'];

    public function removeItem($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refreshCart');
        flash()->success('Product has been removed from the cart successfully!');
    }
    public function render()
    {
       $cart_items = Cart::instance('cart')->content();
       $cart_total = Cart::instance('cart')->subtotal();
        return view('livewire.layout.cart-icon-component' , [
            'cart_items' => $cart_items, 
            'cart_total' => $cart_total,
        ]);
    }
}

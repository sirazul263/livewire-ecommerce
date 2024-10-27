<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Title;
use Livewire\Component;

class CartComponent extends Component
{
    #[Title('Cart')]

    protected $listeners = ['refreshCart'=>'$refresh'];

    public function increaseQuantity($rowId){
       $product=   Cart::instance('cart')->get($rowId);
       $quantity = $product->qty +1;
       Cart::instance('cart')->update($rowId, $quantity);
       $this->dispatch('refreshCart');
    }

    public function decreaseQuantity($rowId){
        $product=   Cart::instance('cart')->get($rowId);
        if($product->qty > 1){
            $quantity = $product->qty -1;
            Cart::instance('cart')->update($rowId, $quantity);
            $this->dispatch('refreshCart');
        }
    }

    public function removeItem($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refreshCart');
        flash()->success('Product has been removed!');
    }

    public function clearCart(){
        Cart::instance('cart')->destroy();
        $this->dispatch('refreshCart');
        flash()->success('All the products form the cart  have been removed!');
    }


    public function render()
    {
        $cart_items = Cart::instance('cart')->content();
        $cart_subtotal = Cart::instance('cart')->subtotal();
        $cart_total = Cart::instance('cart')->total();
        $products = Product::inRandomOrder()->take(12)->get();

        return view('livewire.cart-component' , [
            'cart_items' => $cart_items, 
            'cart_subtotal' => $cart_subtotal,
            'cart_total' => $cart_total,
            'products' => $products
        ]);
    }
}

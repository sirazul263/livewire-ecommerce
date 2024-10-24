<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductDetailsComponent extends Component
{
    #[Title('Product Details')]
   
    public $slug;

    public $quantity =1;
    public $color;
    public $size;

    public function mount($slug){
        $this->slug = $slug; 
    }

    //Quantity

    public function increaseQuantity(){
        $this->quantity++;
    }
    public function decreaseQuantity(){
        if($this->quantity > 1){
            $this->quantity--;
        }
    }

    //Color 

    public function setColor($color){
        $this->color = $color;
    }
    //Size 
    public function setSize($size){
        $this->size = $size;
    }

    public function addToCart($product_id, $product_name, $sale_price){
        Cart::instance('cart')->add($product_id, $product_name, $this->quantity, $sale_price, ['size' => $this->size , 'color'=>$this->color] )->associate('App\Models\Product');
        $this->dispatch('refreshCart');
        flash()->success('Product added to the cart successfully!');

    }

    public function addToWishlist($product_id, $product_name, $sale_price){
        Cart::instance('wishlist')->add($product_id, $product_name, $this->quantity, $sale_price, ['size' => $this->size , 'color'=>$this->color])->associate('App\Models\Product');
        $this->dispatch('refreshWishlist');
        flash()->success('Product added to the wishlist successfully!');
        
    }

    public function removeFromWishlist($product_id){
        foreach (Cart::instance('wishlist')->content() as $wishlist){
            if($wishlist->id ==$product_id){
                Cart::instance('wishlist')->remove($wishlist->rowId);
                $this->dispatch('refreshWishlist');
                flash()->success('Product has been removed from the wishlist successfully!');
                return;
            } else {
                flash()->warning('Unable to remove product from the wishlist!');
            }
        }
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $new_products = Product::latest()->take(3)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->take(4)->get();
        $categories = Category::where('status', 1)->get();
        $image = $product->image;
        $images =  json_decode($product->images);
        array_splice($images, 0, 0, $image);

        $random_products = Product::latest()->inRandomOrder()->take(3)->get();

        return view('livewire.product-details-component' , [
            'product' => $product, 
            'images' => $images,
            'new_products' => $new_products, 
            'related_products' => $related_products, 
            'categories' => $categories, 
            'random_products' => $random_products
        ]);
    }
}

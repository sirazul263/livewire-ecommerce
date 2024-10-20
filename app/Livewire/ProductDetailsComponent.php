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

    public function mount($slug){
        $this->slug = $slug; 
    }

    public function addToCart($product){
        Cart::instance('cart')->add($product['id'], $product['name'], $this->quantity, $product['sale_price'])->associate('App\Models\Product');
        flash()->success('Product added to the cart successfully!');
        return redirect()->route('cart');
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
        return view('livewire.product-details-component' , [
            'product' => $product, 
            'images' => $images,
            'new_products' => $new_products, 
            'related_products' => $related_products, 
            'categories' => $categories, 
        ]);
    }
}

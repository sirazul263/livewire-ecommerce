<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    
    use WithPagination;
    #[Title('Shop')]

    protected $paginationTheme = 'bootstrap';

   
    public function render()
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::paginate(12);
        $new_products = Product::latest()->take(3)->get();

        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $products,
            'new_products' => $new_products
        ]);
    }
}

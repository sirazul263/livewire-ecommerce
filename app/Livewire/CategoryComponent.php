<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination , WithoutUrlPagination;
    #[Title('Category')]

    protected $listeners = ['refreshCart'=>'$refresh'];
    
    protected $paginationTheme = 'bootstrap';

    public $slug;
   
    public $productPerPage =12;

    public $orderBy= 'Default Sorting';

    public $minPrice = 0;

    public $maxPrice = 1000;

    public function mount($slug){
        $this->slug =$slug;
    }
    
    public function setProductPerPage($productPerPage){
        $this->productPerPage = $productPerPage;
    }

    public function sortBy($column){
        $this->orderBy = $column;
    }

    public function render()
    {
        $categories = Category::where('status', 1)->get();
        $category = Category::where('slug', $this->slug)->first();
        //Product Order By Section
        $products = Product::where('category_id', $category->id);

        if($this->orderBy == 'Price: Low to High'){
            $products->orderBy('sale_price', 'asc');
        }
        else if ($this->orderBy == 'Price: High to Low'){
            $products->orderBy('sale_price', 'desc');
        }
        else if ($this->orderBy == 'New Products'){
            $products->latest();
        } 
        else if ($this->orderBy == 'Featured'){
            $products->where('is_featured', 1);
        }

        if($this->minPrice!=0 || $this->maxPrice!=1000){
            $products->whereBetween('sale_price', [$this->minPrice, $this->maxPrice]);
        }
        $new_products = Product::where('category_id', $category->id)->latest()->take(3)->get();

        $productPerPageOptions = [ 12, 24, 36, 48,60 ];

        $sortingOptions = [
            'Default Sorting',
            'Featured',
            'Price: Low to High',
            'Price: High to Low',
            'New Products', 
            'Avg. Rating'
        ];

        return view('livewire.category-component', [
            'productPerPageOptions'=>$productPerPageOptions,
            'sortingOptions'=>$sortingOptions,
            'categories' => $categories,
            'category_name' => $category->name,
            'products' => $products->paginate($this->productPerPage),
            'new_products' => $new_products
        ]);
    }

    
    public function addToCart($product){
        Cart::instance('cart')->add($product['id'], $product['name'], 1, $product['sale_price'])->associate('App\Models\Product');
        $this->dispatch('refreshCart');
        flash()->success('Product added to the cart successfully!');
    }
    
}

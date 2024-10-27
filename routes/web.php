<?php

use App\Http\Middleware\Admin;
use App\Livewire\AboutComponent;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\BlogComponent;
use App\Livewire\CartComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\ContactComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ProductDetailsComponent;
use App\Livewire\SearchComponent;
use App\Livewire\ShopComponent;
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
Route::get('/products/{slug}', ProductDetailsComponent::class)->name('products.details');
Route::get('/product-category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/product-search', SearchComponent::class)->name('product.search');

Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/blog', BlogComponent::class)->name('blog');
Route::get('/about', AboutComponent::class)->name('about');

//Customer
Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

});

Route::middleware(['auth', Admin::class])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

});


require __DIR__.'/auth.php';

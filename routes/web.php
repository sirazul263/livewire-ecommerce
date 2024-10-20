<?php

use App\Http\Middleware\Admin;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\CartComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ProductDetailsComponent;
use App\Livewire\ShopComponent;
use App\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/products/{slug}', ProductDetailsComponent::class)->name('products.details');

//Customer
Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

});

Route::middleware(['auth', Admin::class])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

});


require __DIR__.'/auth.php';

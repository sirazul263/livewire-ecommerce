<?php

namespace App\Livewire;

use App\Models\ShippingAddress;
use Carbon\Exceptions\Exception;
use Devfaysal\BangladeshGeocode\Models\District;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CheckoutComponent extends Component
{
    #[Title('Checkout')]

    public $address_type;
    public $name;
    public $phone;
    public $email;
    public $district;
    public $post_code;
    public $address;
    
    public function showAddressModal(){
        $this->dispatch('show-address-modal'); 
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'address_type' => 'required',
            'name' => 'required|min:3|max:40',
            'phone' => 'required|min:11|max:11',
            'email' => 'required|email|max:255',
            'district' => 'required|max:255',
            'post_code' => 'required|min:4|max:10',
            'address' => 'required|min:3|max:255',
        ]);
    }

    public function addAddress (){
        $this->validate([
            'address_type' => 'required',
            'name' => 'required|min:3|max:40',
            'phone' => 'required|min:11|max:11',
            'email' => 'required|email|max:255',
            'district' => 'required|max:255',
            'post_code' => 'required|min:4|max:10',
            'address' => 'required|min:3|max:255',
        ]);

        try{
            $shipping_address = new ShippingAddress();
            $shipping_address->user_id = Auth::user()->id; 
            $shipping_address->address_type = $this->address_type;
            $shipping_address->name = $this->name;
            $shipping_address->phone = $this->phone;
            $shipping_address->email = $this->email;
            $shipping_address->district = $this->district;
            $shipping_address->post_code = $this->post_code;
            $shipping_address->address = $this->address;
            $shipping_address->save();
            $this->dispatch('hide-address-modal');
            flash()->success('Address added successfully');
        }
        catch(Exception $e){
            flash()->error('Failed to add address. Please try again.');
        }
    }

    public function render()
    {
        $products = Cart::instance('cart')->content();
        $subtotal = Cart::instance('cart')->subtotal();
        $total = Cart::instance('cart')->total();
        $districts = District::all();
        return view('livewire.checkout-component' , [
            'products' => $products,
            'subtotal' => $subtotal,
            'total' => $total,
            'districts' => $districts
        ]);
    }
}

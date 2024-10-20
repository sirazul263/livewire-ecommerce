<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => '',
    'agree' => '',
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();
    $validated['password'] = Hash::make($validated['password']);

    event(new Registered(($user = User::create($validated))));

    Auth::login($user);
    $this->redirectIntended(default: route('home', absolute: false), navigate: true);
};

?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Register
            </div>
        </div>
    </div>
    <section class="pt-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Create an Account</h3>
                                    </div>
                                    <form wire:submit.prevent="register">
                                        <div class="form-group">
                                            <input type="text" wire:model="name" placeholder="Name">
                                            @if ($errors->get('name'))
                                                <div class="text-danger font-xs fw-semi-bold">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" wire:model="email" placeholder="Email">
                                            @if ($errors->get('email'))
                                                <div class="text-danger font-xs fw-semi-bold">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" wire:model="password" placeholder="Password">
                                            @if ($errors->get('password'))
                                                <div class="text-danger font-xs fw-semi-bold">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" wire:model="password_confirmation"
                                                placeholder="Confirm password">
                                            @if ($errors->get('password_confirmation'))
                                                <div class="text-danger font-xs fw-semi-bold">
                                                    {{ $errors->first('password_confirmation') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" wire:model="agree"
                                                        id="exampleCheckbox12" value="">
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I
                                                            agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="privacy-policy.html"><i
                                                    class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up"
                                                name="login">
                                                <span wire:loading.remove wire:target='register'>Submit &amp;
                                                    Register<span>
                                                        <span wire:loading wire:target='register'>Submitting...<span>
                                            </button>

                                        </div>
                                    </form>
                                    <div class="text-muted text-center">Already have an account? <a href="/login"
                                            wire:navigate>Sign
                                            in now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="assets/imgs/login.png">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

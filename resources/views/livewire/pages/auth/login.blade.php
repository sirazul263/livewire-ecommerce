<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('home', absolute: false), navigate: true);
};

?>

<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Login
                </div>
            </div>
        </div>
        <section class="pt-20 pb-20">
            {{ session('status') }}
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="assets/imgs/login.png">
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div
                                    class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <form wire:submit.prevent="login">
                                            <div class="form-group">
                                                <input type="text" wire:model="form.email" placeholder="Your Email"
                                                    autofocus autocomplete="username">

                                                @if ($errors->get('form.email'))
                                                    <div class="text-danger font-xs fw-semi-bold">
                                                        {{ $errors->first('form.email') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input type="password" wire:model="form.password"
                                                    placeholder="Password">
                                                @if ($errors->get('form.password'))
                                                    <div class="text-danger font-xs fw-semi-bold">
                                                        {{ $errors->first('form.password') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox"
                                                            wire:model="form.remember" id="exampleCheckbox1"
                                                            value="">
                                                        <label class="form-check-label"
                                                            for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{ route('password.request') }}"
                                                    wire:navigate>Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up"
                                                    name="login">
                                                    <span wire:loading.remove>
                                                        Log in
                                                    </span>
                                                    <span wire:loading wire:loading.target="login">
                                                        Submitting....
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>

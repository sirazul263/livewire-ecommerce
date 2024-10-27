<div>
    <style>
        .radio-inputs {
            display: flex;
            justify-content: center;
            align-items: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .radio-inputs>* {
            margin: 6px;
        }

        .radio-input:checked+.radio-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            color: #2260ff;
        }

        .radio-input:checked+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
            background-color: #2260ff;
            border-color: #2260ff;
        }

        .radio-input:checked+.radio-tile .radio-icon svg {
            fill: #2260ff;
        }

        .radio-input:checked+.radio-tile .radio-label {
            color: #2260ff;
        }

        .radio-input:focus+.radio-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
        }

        .radio-input:focus+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 80px;
            min-height: 80px;
            border-radius: 0.5rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: 0.15s ease;
            cursor: pointer;
            position: relative;
        }

        .radio-tile:before {
            content: "";
            position: absolute;
            display: block;
            width: 0.75rem;
            height: 0.75rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            border-radius: 50%;
            top: 0.25rem;
            left: 0.25rem;
            opacity: 0;
            transform: scale(0);
            transition: 0.25s ease;
        }

        .radio-tile:hover {
            border-color: #2260ff;
        }

        .radio-tile:hover:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-icon svg {
            width: 2rem;
            height: 2rem;
            fill: #494949;
        }

        .radio-label {
            color: #707070;
            transition: 0.375s ease;
            text-align: center;
            font-size: 13px;
        }

        .radio-input {
            clip: rect(0 0 0 0);
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }
    </style>
    <div wire:ignore.self class="modal fade  custom-modal" id="addressModal" tabindex="-1"
        aria-labelledby="quickViewModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Address </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form wire:submit.prevent="addAddress">
                        <div class="radio-inputs mb-20">
                            <label>
                                <input class="radio-input" type="radio" name="home" value="home"
                                    wire:model='address_type'>
                                <span class="radio-tile">
                                    <span class="radio-icon">
                                        <img class="" src="{{ asset('/') }}assets/imgs/home-icon.png"
                                            alt="" height="36px">
                                    </span>
                                    <span class="radio-label">Home</span>
                                </span>
                            </label>

                            <label>
                                <input class="radio-input" type="radio" name="office" value="office"
                                    wire:model='address_type'>
                                <span class="radio-tile">
                                    <span class="radio-icon">
                                        <img class="" src="{{ asset('/') }}assets/imgs/home-icon.png"
                                            alt="" height="36px">
                                    </span>
                                    <span class="radio-label">Office</span>
                                </span>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="other" value="other"
                                    wire:model='address_type'>
                                <span class="radio-tile">
                                    <span class="radio-icon">
                                        <img class="" src="{{ asset('/') }}assets/imgs/home-icon.png"
                                            alt="" height="36px">
                                    </span>
                                    <span class="radio-label">Other</span>
                                </span>
                            </label>
                        </div>
                        @if ($errors->get('address_type'))
                            <div class="text-danger text-center font-xs fw-semi-bold mb-3">
                                {{ $errors->first('address_type') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Full Name <span class="text-danger">*<span> </label>
                                <input type="text" wire:model="name" id="name" placeholder="Your Full Name"
                                    autofocus autocomplete="name">
                                @if ($errors->get('name'))
                                    <div class="text-danger font-xs fw-semi-bold">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone">Mobile Number<span class="text-danger">*<span> </label>
                                <input type="number" wire:model="phone" id="phone" placeholder="Mobile Number">
                                @if ($errors->get('phone'))
                                    <div class="text-danger font-xs fw-semi-bold">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">Email <span class="text-danger">*<span> </label>
                                <input type="email" wire:model="email" id="email" placeholder="Your Email">
                                @if ($errors->get('email'))
                                    <div class="text-danger font-xs fw-semi-bold">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group input-style mb-20">
                                <label for="district">District <span class="text-danger">*<span> </label>

                                <select name="district" id="district" class="form-control" wire:model="district">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->get('district'))
                                    <div class="text-danger font-xs fw-semi-bold">
                                        {{ $errors->first('district') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="post_code">Post Code <span class="text-danger">*<span> </label>
                                <input type="text" wire:model="post_code" id="post_code"
                                    placeholder="Your Post Code">
                                @if ($errors->get('post_code'))
                                    <div class="text-danger font-xs fw-semi-bold">
                                        {{ $errors->first('post_code') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="address">Address <span class="text-danger">*<span> </label>
                                <input type="text" wire:model="address" id="address"
                                    placeholder="Your Address">

                                @if ($errors->get('address'))
                                    <div class="text-danger font-xs fw-semi-bold">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group col-md-4 offset-md-4 mt-20">
                            <button type="submit" class="btn btn-fill-out btn-block hover-up w-100" name="login">
                                <span wire:loading.remove>
                                    Submit
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
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" wire:navigate rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25 d-flex justify-content-between align-items-center">
                            <h4>Shipping Details</h4>
                            <button type="button" wire:click.prevent="showAddressModal()"
                                class="btn btn-primary btn-sm border-0">Add Shipping Address
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-sm-15">
                                <div class="toggle_info">
                                    <div class="row d-flex align-items-center gx-1">
                                        <div class="col-md-4 mb-sm-15">
                                            <div class="radio-inputs">
                                                <label>
                                                    <input class="radio-input" type="radio" name="engine">
                                                    <span class="radio-tile">
                                                        <span class="radio-icon">
                                                            <img class=""
                                                                src="{{ asset('/') }}assets/imgs/home-icon.png"
                                                                alt="" height="36px">
                                                        </span>
                                                        <span class="radio-label">Home</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-sm-15">
                                            <p style="font-size: 14px"> Address Type : Home</p>
                                            <p style="font-size: 14px"> Name : Md Sirazul Islam</p>
                                            <p style="font-size: 14px">Email: sirazfe@gmail.com</p>
                                            <p style="font-size: 14px">Mobile: 01734320986</p>
                                            <p style="font-size: 14px">Address : J-32, Mirpur</p>
                                        </div>
                                        <div class="col-md-4 mb-sm-15 text-center">
                                            <a wire:click.prevent= "removeItem()" class="text-muted"><i
                                                    class="fi-rs-trash"></i>
                                            </a>
                                            <a wire:click.prevent= "removeItem()" class="text-muted"><i
                                                    class="fi-rs-pencil ms-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <form>
                            <div class="mb-20 mt-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr wire:key="{{ $product->id }}">
                                                <td class="image product-thumbnail"><img
                                                        src="{{ $product->model->image }}" alt="#"></td>
                                                <td>
                                                    <h5><a wire:navigate
                                                            href="/products/{{ $product->model->slug }}">{{ $product->model->name }}</a>
                                                    </h5>
                                                    <span class="product-qty">x {{ $product->qty }}</span>
                                                </td>
                                                <td>&#2547; {{ $product->total() }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">&#2547; {{ $total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span
                                                    class="font-xl text-brand fw-900">&#2547;
                                                    {{ $subtotal }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Select Payment Method</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="icheck-material-teal icheck-inline">
                                        <input type="radio" id="cod" name="someGroupName" />
                                        <label for="cod">Cash On
                                            Delivery</label>
                                    </div>
                                    <div class="icheck-material-teal icheck-inline">
                                        <input type="radio" id="card" name="someGroupName" />
                                        <label for="card">Card Payment</label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-fill-out btn-block mt-30 w-100">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @script
        <script>
            $wire.on('show-address-modal', (event) => {
                $(addressModal).modal('show');
            });
            $wire.on('hide-address-modal', (event) => {
                $(addressModal).modal('hide');
            });
        </script>
    @endscript
</div>

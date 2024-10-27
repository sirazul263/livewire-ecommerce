<div>
    <style>
        .quantity-field {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 120px;
            height: 40px;
            margin: 0 auto;
        }

        .quantity-field .value-button {
            border: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 100%;
            padding: 0;
            background: #eee;
            outline: none;
            cursor: pointer;
        }

        .quantity-field .value-button:hover {
            background: rgb(230, 230, 230);
        }

        .quantity-field .value-button:active {
            background: rgb(210, 210, 210);
        }

        .quantity-field .decrease-button {
            margin-right: -4px;
            border-radius: 8px 0 0 8px;
        }

        .quantity-field .increase-button {
            margin-left: -4px;
            border-radius: 0 8px 8px 0;
        }

        .quantity-field .number {
            display: inline-block;
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 100%;
            line-height: 40px;
            font-size: 11pt;
            box-sizing: border-box;
            background: white;
            font-family: calibri;
        }

        .quantity-field .number::selection {
            background: none;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" wire:navigate rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                @if (count($cart_items) > 0)
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_items as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img src="{{ $item->model->image }}"
                                                        alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name">
                                                        <a href="/products/{{ $item->model->slug }}">
                                                            {{ $item->name }}
                                                        </a>
                                                    </h5>
                                                    <div class="d-flex  justify-content-center">
                                                        @if ($item->options->color)
                                                            <p class="mb-0 fw-bold">
                                                                Color : {{ ucwords($item->options->color) }}
                                                            </p>
                                                        @endif
                                                        @if ($item->options->size)
                                                            <p class="mb-0 fw-bold">, Size :{{ $item->options->size }}
                                                            </p>
                                                        @endif
                                                    </div>

                                                </td>
                                                <td class="price" data-title="Price">
                                                    <span>&#2547;
                                                        {{ $item->model->sale_price }} </span>
                                                </td>
                                                <td class="text-center" data-title="Stock">
                                                    <div class="quantity-field">
                                                        <button class="value-button decrease-button"
                                                            wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"
                                                            title="Azalt">-</button>
                                                        <div class="number">{{ $item->qty }}</div>
                                                        <button class="value-button increase-button"
                                                            wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"
                                                            title="Arrtır">+
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>&#2547;
                                                        {{ $item->subtotal() }}</span>
                                                </td>
                                                <td class="action" data-title="Remove"><a
                                                        wire:click.prevent= "removeItem('{{ $item->rowId }}')"
                                                        class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" class="text-end">
                                                <a wire:click.prevent="clearCart" class="text-muted"> <i
                                                        class="fi-rs-cross-small"></i> Clear
                                                    Cart</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span
                                                        class="font-lg fw-900 text-brand">&#2547;
                                                        {{ $cart_subtotal }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free
                                                    Shipping</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span
                                                            class="font-xl fw-900 text-brand">&#2547;
                                                            {{ $cart_total }} </span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="/checkout" wire:navigate class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                                    Proceed
                                    To CheckOut</a>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="card py-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>No item available in cart.</h3>
                                <img class="hover-img" src="{{ asset('/') }}assets/imgs/empty-cart.jpg"
                                    alt="" height="200px">
                            </div>
                        </div>
                    </div>
                @endif

                <div class="divider center_icon mt-10 mb-50"><i class="fi-rs-fingerprint"></i></div>
                <div>

                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> Add more items to the cart!</p>
                        </div>
                    </div>
                    <div class="row product-grid-3 g-2">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-6 col-sm-6" wire:key="{{ $product->id }}">
                                <div class="product-cart-wrap mb-20">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="/products/{{ $product->slug }}" wire:navigate>
                                                <img class="default-img" src="{{ $product->image }}"
                                                    alt="{{ $product->name }}">
                                                <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="/product-category/{{ $product->category->slug }}"
                                                wire:navigate>{{ $product->category->name }}</a>
                                        </div>
                                        <h2><a wire:navigate
                                                href="/products/{{ $product->slug }}">{{ $product->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>&#2547; {{ $product->regular_price }} </span>
                                            <span class="old-price">&#2547; {{ $product->sale_price }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a wire:click.prevent="addToCart({{ $product }})"
                                                aria-label="Add To Cart" class="action-btn hover-up"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

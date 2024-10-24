<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" wire:navigate rel="nofollow">Home</a>
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">

            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p> We found <strong class="text-brand">{{ count($wishlist_items) }}</strong> items for you!</p>
                </div>
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Show:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-grid-3">
                @foreach ($wishlist_items as $item)
                    <div class="col-lg-3 col-md-2 col-6 col-sm-6" wire:key="{{ $item->id }}">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="product-details.html">
                                        <img class="default-img" src="{{ $item->model->image }}" alt="">
                                        <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal">
                                        <i class="fi-rs-search"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                            class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="/product-category/{{ $item->model->category->slug }}"
                                        wire:navigate>{{ $item->model->category->name }}</a>
                                </div>
                                <h2><a wire:navigate
                                        href="/products/{{ $item->model->slug }}">{{ $item->model->name }}</a>
                                </h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>&#2547; {{ $item->model->regular_price }} </span>
                                    <span class="old-price">&#2547; {{ $item->model->sale_price }}</span>
                                </div>
                                <div class="product-action-1 show">
                                    <a aria-label="Remove From Wishlist" class="action-btn hover-up"
                                        wire:click.prevent="removeFromWishlist('{{ $item->rowId }}')"><i
                                            class="fi-rs-shopping-bag-add"></i>
                                    </a>
                                    <a aria-label="Add To Cart" class="action-btn hover-up"
                                        wire:click.prevent="moveToCart('{{ $item->rowId }}')"><i
                                            class="fi-rs-shopping-bag-add"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</main>

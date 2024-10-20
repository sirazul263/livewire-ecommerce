<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="/cart" wire:navigate>
        <img alt="Surfside Media" src="../assets/imgs/theme/icons/icon-cart.svg">
        <span class="pro-count blue">{{ count($cart_items) }}</span>
    </a>

    @if (count($cart_items) > 0)
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @foreach ($cart_items as $item)
                    <li>
                        <div class="shopping-cart-img">
                            <a href="/products/{{ $item->model->slug }}" wire:navigate>
                                <img alt="Surfside Media" src="../assets/imgs/shop/thumbnail-3.jpg"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="/products/{{ $item->model->slug }}"
                                    wire:navigate>{{ ucwords(substr($item->name, 0, 20)) }}</a></h4>
                            <h4><span>{{ $item->qty }} × </span>&#2547; {{ $item->model->sale_price }}</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a wire:click.prevent="removeItem('{{ $item->rowId }}')"><i
                                    class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>&#2547; {{ $cart_total }}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="/cart" wire:navigate class="outline">View cart</a>
                    <a href="/checkout" wire:navigate>Checkout</a>
                </div>
            </div>
        </div>
    @endif
</div>

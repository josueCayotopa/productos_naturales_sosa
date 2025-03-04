<div class="product-detail-wrapper">
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Cart Page</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Cart</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-shape one"><img src="assets/img/others/video_shape01.png" alt="shape"></div>
        <div class="video-shape two"><img src="assets/img/others/video_shape02.png" alt="shape"></div>
    </section>
    <!-- breadcrumb-area-end -->

  <!-- cart-area -->
<div class="cart__area section-py-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table cart__table">
                    <thead>
                        <tr>
                            <th class="product__thumb">&nbsp;</th>
                            <th class="product__name">Producto</th>
                            <th class="product__price">Precio</th>
                            <th class="product__quantity">Cantidad</th>
                            <th class="product__subtotal">Subtotal</th>
                            <th class="product__remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_items as $item)
                            <tr>
                                <td class="product__thumb">
                                    <a href="shop-details.html"><img src="{{ $item['images'] }}" alt=""></a>
                                </td>
                                <td class="product__name">
                                    <a href="shop-details.html">{{ $item['name'] }}</a>
                                </td>
                                <td class="product__price">S/ {{ number_format($item['unit_amount'], 2, '.', ',') }}</td>
                                <td class="product__quantity">
                                    <div class="quickview-cart-plus-minus">
                                        <button wire:click="decreaseQty({{ $item['product_id'] }})"
                                            class="btn btn-sm">-</button>
                                        <input type="text" value="{{ $item['quantity'] }}" readonly>
                                        <button wire:click="increaseQty({{ $item['product_id'] }})"
                                            class="btn btn-sm">+</button>
                                    </div>
                                </td>
                                <td class="product__subtotal">S/
                                    {{ number_format($item['unit_amount'] * $item['quantity'], 2, '.', ',') }}</td>
                                <td class="product__remove">
                                    <a href="#" wire:click="remove_item({{ $item['product_id'] }})">×</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="cart__actions">
                                <form action="#" class="cart__actions-form">
                                    <input type="text" placeholder="Código de cupón">
                                    <button type="submit" class="btn btn-sm">Aplicar cupón</button>
                                </form>
                                <div class="update__cart-btn text-end f-right">
                                    <button wire:click="updateCart" class="btn btn-sm">Actualizar carrito</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="cart__collaterals-wrap">
                    <h2 class="title">Totales del carrito</h2>
                    <ul class="list-wrap">
                        <li>Subtotal <span>S/ {{ number_format($grand_total, 2, '.', ',') }}</span></li>
                        <li>Total <span class="amount">S/ {{ number_format($grand_total, 2, '.', ',') }}</span></li>
                    </ul>
                    @if ($cart_items)
                    <a href="{{ route('checkout') }}" class="btn btn-sm">Proceder a la compra</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-area-end -->


</div>

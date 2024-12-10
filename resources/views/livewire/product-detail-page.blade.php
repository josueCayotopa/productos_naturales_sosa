<div class="product-detail-wrapper">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Detalles de la Tienda</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Inicio</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Detalles de la Tienda</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-shape one"><img src="{{ asset('assets/img/others/video_shape01.png') }}" alt="shape"></div>
        <div class="video-shape two"><img src="{{ asset('assets/img/others/video_shape02.png') }}" alt="shape"></div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-details-area -->
    <section class="inner-shop-details-area">
        <div class="container">
            <div class="row">
                <!-- Imágenes del producto -->
                <div class="col-lg-5 col-md-6">
                    <div class="product-images">
                        <div class="main-image mb-3">
                            <img id="mainImage" src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        @if (count($product->images) > 1)
                            <div class="thumbnail-images">
                                <div class="row">
                                    @foreach ($product->images as $index => $image)
                                        <div class="col-3 mb-2">
                                            <img src="{{ asset('storage/' . $image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="img-thumbnail thumbnail-image"
                                                 data-image="{{ asset('storage/' . $image) }}"
                                                 onclick="changeMainImage(this)">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
    
                <!-- Detalles del producto -->
                <div class="col-lg-7 col-md-6">
                    <div class="inner-shop-details-content">
                        <h4 class="title">{{ $product->name }}</h4>
                        <div class="inner-shop-details-meta">
                            <ul class="list-wrap">
                                <li>Marca: <a href="#">{{ $product->brand->name }}</a></li>
                                <li class="inner-shop-details-review">
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $product->rating ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </div>
                                    <span>({{ number_format($product->rating, 1) }})</span>
                                </li>
                                <li>ID: <span>{{ $product->sku }}</span></li>
                            </ul>
                        </div>
                        <div class="inner-shop-details-price">
                            @if ($product->discount_price)
                                <h2 class="price">
                                    <span class="text-muted text-decoration-line-through">S/ {{ number_format($product->price, 2) }}</span>
                                    <span class="text-danger">S/ {{ number_format($product->discount_price, 2) }}</span>
                                </h2>
                            @else
                                <h2 class="price">S/ {{ number_format($product->price, 2) }}</h2>
                            @endif
                        </div>
    
                        <div class="product-description">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="inner-shop-perched-info">
                            <div class="sd-cart-wrap">
                                <form action="#">
                                    <div class="quickview-cart-plus-minus">
                                        <button type="button" class="dec qtybutton" wire:click="decreaseQty">-</button>
                                        <input type="text" wire:model="quantity" readonly>
                                        <button type="button" class="inc qtybutton" wire:click="increaseQty">+</button>
                                    </div>
                                </form>
                            </div>
                            <a href="#" class="cart-btn" wire:click.prevent="addToCart({{ $product->id }})">Añadir</a>
                            <a href="#" class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Reseñas -->
            {{-- <div class="row mt-5">
                <div class="col-12">
                    <h4>Reseñas del producto</h4>
                    @if ($product->reviews->count() > 0)
                        <ul class="list-unstyled">
                            @foreach ($product->reviews as $review)
                                <li class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $review->user->name }}</strong>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mb-0">{{ $review->comment }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No hay reseñas para este producto aún.</p>
                    @endif
                </div>
            </div> --}}
        </div>
    </section>


</div>
{{-- @push('styles')
<style>
    .quickview-cart-plus-minus {
        display: flex;
        align-items: center;
    }
    .quickview-cart-plus-minus input {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 5px;
    }
    .quickview-cart-plus-minus .qtybutton {
        background: none;
        border: 1px solid #ddd;
        padding: 5px 10px;
        cursor: pointer;
    }
    .cart-btn, .wishlist-btn {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 10px;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
    }
    .wishlist-btn {
        background-color: #6c757d;
        margin-left: 10px;
    }
</style>
@endpush --}}
<script>
    function changeMainImage(element) {
        document.getElementById('mainImage').src = element.getAttribute('data-image');
    }
    
    function incrementQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
    
    function decrementQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
    
    // Inicializar los tooltips de Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
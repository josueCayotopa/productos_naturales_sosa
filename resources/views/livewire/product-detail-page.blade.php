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
                <!-- Imagenes del producto -->
                <div class="col-lg-5 col-md-6">
                    <div class="product-images">
                        <div class="main-image">
                            <!-- Mostrar la imagen seleccionada -->
                            <img src="{{ $selectedImage ? asset('storage/' . $selectedImage) : '' }}" alt="Producto">
                        </div>
                        @if (count($product->images) > 1)
                            <div class="thumbnail-images mt-3">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Producto" class="img-thumbnail"
                                        wire:click="selectImage('{{ $image }}')" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Detalles del producto -->
                <div class="col-lg-6">
                    <div class="inner-shop-details-content">
                        <h4 class="title">{{ $product->name }}</h4>
                        <div class="inner-shop-details-meta">
                            <ul class="list-wrap">
                                <li>Brands : <a href="shop.html"> {{ $product->brand->name }}</a></li>
                                <li class="inner-shop-details-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>(4.5)</span>
                                </li>
                                <li>ID : <span>QZX8VGH</span></li>
                            </ul>
                        </div>
                        <div class="inner-shop-details-price">
                            @if ($product->discount_price)
                                <h2 class="price"> class="regular-price">S/ {{ number_format($product->price, 2) }}
                                </h2>
                                <span class="discount-price">S/ {{ number_format($product->discount_price, 2) }}</span>
                            @else
                                <span class="regular-price">S/ {{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>

                        <div class="product-description">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="inner-shop-perched-info">
                            <div class="sd-cart-wrap">
                                <form action="#">
                                    <div class="quickview-cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                            <a wire:click="addToCart({{ $product->id }})" href="cart.html" class="cart-btn">add to
                                cart</a>
                            <a href="shop-details.html" class="wishlist-btn" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Wishlist"><i class="far fa-heart"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Reseñas -->
            {{-- <div class="row mt-5">
            <div class="col-12">
                <h4>Reseñas del producto</h4>
                @if ($product->reviews->count() > 0)
                    <ul class="product-reviews">
                        @foreach ($product->reviews as $review)
                            <li>
                                <strong>{{ $review->user->name }}:</strong> {{ $review->rating }} estrellas
                                <p>{{ $review->comment }}</p>
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
    <!-- shop-details-area-end -->

</div>

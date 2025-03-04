 <!-- breadcrumb-area -->
 <div class="product-detail-wrapper">
     <section class="breadcrumb-area breadcrumb-bg">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-10">
                     <div class="breadcrumb-content text-center">
                         <h2 class="title">Nuestra tienda</h2>
                         <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item trail-item trail-begin">
                                     <a href="index.html"><span>Inicio</span></a>
                                 </li>
                                 <li class="breadcrumb-item trail-item trail-end"><span>
                                         Nuestra tienda</span></li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
         <div class="video-shape one"><img src="{{ asset('assets/img/others/video_shape01.png') }}" alt="shape">
         </div>
         <div class="video-shape two"><img src="{{ asset('assets/img/others/video_shape02.png') }}" alt="shape">
         </div>
     </section>


     <div class="inner-shop-area">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-3 col-lg-4 col-md-8 col-sm-8">
                     <aside class="shop-sidebar">
                         <div class="widget">
                             <h4 class="sidebar-title">Filtrar por Precio</h4>
                             <div class="price_filter">
                                 <div id="slider-range"></div>
                                 <div class="price_slider_amount">
                                     <span>Precio :</span>
                                     <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                     <input type="submit" class="btn" value="Filter">
                                 </div>
                             </div>
                         </div>
                         <div class="widget">
                             <h4 class="sidebar-title">CATEGORÍAS</h4>

                             <ul class="categories-list list-wrap">
                                 @foreach ($categories as $category)
                                     <li wire:key="{{ $category->id }}">

                                         <input type="checkbox" wire:model.live="selected_catefories"
                                             id="{{ $category->slug }}" value="{{ $category->id }}" class="">
                                         <span class="">{{ $category->name }}</span>


                                     </li>
                                 @endforeach

                             </ul>
                         </div>
                         <div class="widget">
                             <h4 class="sidebar-title">Marcas</h4>

                             <ul class="categories-list list-wrap">
                                 @foreach ($brands as $brand)
                                     <li class="mb-4" wire:key="{{ $brand->id }}">
                                         <label for="{{ $brand->slug }}" class="">
                                             <input type="checkbox" wire:model.live="selected_brands"
                                                 id="{{ $brand->slug }}" value="{{ $brand->id }}"
                                                 class="w-4 h-4 mr-2">
                                             <span class="">{{ $brand->name }}</span>
                                         </label>
                                     </li>
                                 @endforeach
                             </ul>
                         </div>

                     </aside>
                 </div>
                 <div class="col-xl-9 col-lg-8 col-md-12 col-sm-8 shop-sidebar-pad order-first">
                     <div class="shop-top-wrap">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="shop-top-left">
                                     <p class="woocommerce-result-count shop-show-result">
                                         Mostrando {{ $products->firstItem() }}-{{ $products->lastItem() }} de
                                         {{ $products->total() }} resultados
                                     </p>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="shop-top-right selection">
                                     <select wire:model.live="sort" id="shortBy" name="orderby"
                                         class="orderby form-select" aria-label="Shop order">
                                         <option value="latest">Estado del producto</option>
                                         <option value="featured">Productos destacados</option>
                                         <option value="on_sale">En Oferta</option>
                                         <option value="price_asc">Ordenar por precio: de menor a mayor</option>
                                         <option value="price_desc">Ordenar por precio: de mayor a menor</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="suxnix-shop-product-main">
                         <div class="row">
                             @foreach ($products as $product)
                                 <div class="col-xl-4 col-lg-6 col-md-6" wire:key="{{ $product->id }}">
                                     <div class="home-shop-item inner-shop-item">
                                         <div class="home-shop-thumb">
                                             <a href="{{ $product->slug ? '/products/' . $product->slug : '#' }}">
                                                 <img src="{{ asset('storage/' . $product->images[0]) }}"
                                                     alt="{{ $product->name }}">
                                                 @if ($product->discount_price)
                                                     <span
                                                         class="discount">-{{ number_format((($product->price - $product->discount_price) / $product->price) * 100, 0) }}%</span>
                                                 @endif
                                             </a>
                                         </div>
                                         <div class="home-shop-content">
                                             <div class="shop-item-cat"><a
                                                     href="#">{{ $product->category->name }}</a></div>
                                             <h4 class="title"><a
                                                     href="{{ $product->slug ? '/products/' . $product->slug : '#' }}">{{ $product->name }}</a>
                                             </h4>
                                             <span class="home-shop-price">
                                                 @if ($product->discount_price)
                                                     <del>S/ {{ number_format($product->price, 2) }}</del>
                                                     S/ {{ number_format($product->discount_price, 2) }}
                                                 @else
                                                     S/ {{ number_format($product->price, 2) }}
                                                 @endif
                                             </span>
                                             <div class="home-shop-rating">
                                                 @for ($i = 1; $i <= 5; $i++)
                                                     <i
                                                         class="fas fa-star{{ $i <= $product->rating ? '' : '-half-alt' }}"></i>
                                                 @endfor
                                                 <span class="total-rating">({{ $product->rating_count }})</span>
                                             </div>
                                             <div class="shop-content-bottom">
                                                 <a href="#" class="cart"
                                                     wire:click.prevent="addToCart({{ $product->id }})">
                                                     <i class="flaticon-shopping-cart"></i></i>
                                                 </a>
                                                 <a href="{{ $product->slug ? '/products/' . $product->slug : '#' }}"
                                                     class="btn btn-two">Comprar Ahora</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                         <div class="pagination-wrap">
                             {{ $products->links() }}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 

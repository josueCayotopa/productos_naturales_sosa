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
                                            id="{{ $brand->slug }}" value="{{ $brand->id }}" class="w-4 h-4 mr-2">
                                        <span class="">{{ $brand->name }}</span>
                                    </label>
                                </li>
                            @endforeach

                            </ul>
                        </div>
                         <div class="widget">
                             <h4 class="sidebar-title">
                                 ÚLTIMOS PRODUCTOS</h4>
                             <div class="lp-post-list">
                                 <ul class="lp-post-item list-wrap">
                                     <li>
                                         <div class="lp-post-thumb">
                                             <a href="shop-details.html"><img
                                                     src="assets/img/products/home_shop_thumb01.png" alt="img"></a>
                                         </div>
                                         <div class="lp-post-content">
                                             <ul class="lp-post-rating list-wrap">
                                                 <li>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                 </li>
                                             </ul>
                                             <h4 class="title"><a href="shop-details.html">multi vitamin C</a></h4>
                                             <span class="price">$29.00</span>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="lp-post-thumb">
                                             <a href="shop-details.html"><img
                                                     src="assets/img/products/home_shop_thumb02.png" alt="img"></a>
                                         </div>
                                         <div class="lp-post-content">
                                             <ul class="lp-post-rating list-wrap">
                                                 <li>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                 </li>
                                             </ul>
                                             <h4 class="title"><a href="shop-details.html">B-complex Zinc</a></h4>
                                             <span class="price">$36.00</span>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="lp-post-thumb">
                                             <a href="shop-details.html"><img
                                                     src="assets/img/products/home_shop_thumb03.png" alt="img"></a>
                                         </div>
                                         <div class="lp-post-content">
                                             <ul class="lp-post-rating list-wrap">
                                                 <li>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                 </li>
                                             </ul>
                                             <h4 class="title"><a href="shop-details.html">Protein Powder</a></h4>
                                             <span class="price">$19.99</span>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                         <div class="widget">
                             <h4 class="sidebar-title">
                                 Etiquetas de producto</h4>
                             <ul class="Product-tag-list list-wrap">
                                 <li><a href="shop.html">Bone Support</a></li>
                                 <li><a href="shop.html">Energy Support</a></li>
                                 <li><a href="shop.html">Hair</a></li>
                                 <li><a href="shop.html">Multivitamins</a></li>
                                 <li><a href="shop.html">Pre-Workout</a></li>
                                 <li><a href="shop.html">Protein</a></li>
                                 <li><a href="shop.html">Skin & Nails</a></li>
                             </ul>
                         </div>
                     </aside>
                 </div>
                 <div class="col-xl-9 col-lg-8 col-md-12 col-sm-8 shop-sidebar-pad order-first">
                     <div class="shop-top-wrap">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="shop-top-left">
                                     <p class="woocommerce-result-count shop-show-result">Mostrando 1-6 de 18
                                         resultados</p>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="shop-top-right selection">
                                     <form class="woocommerce-ordering mb-0" method="get">
                                         <select id="shortBy" name="orderby" class="orderby form-select"
                                             aria-label="Shop order">
                                             <option value="menu_order" selected="selected">Clasificación
                                                 predeterminada</option>
                                             <option value="popularity">Ordenar por popularidad</option>
                                             <option value="rating">Ordenar por calificación promedio</option>
                                             <option value="date">Ordenar por último</option>
                                             <option value="price">Ordenar por precio: de menor a mayor</option>
                                             <option value="price-desc">Ordenar por precio: de mayor a menor</option>
                                         </select>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="suxnix-shop-product-main">
                         <div class="row">
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                 <div class="home-shop-item inner-shop-item">
                                     <div class="home-shop-thumb">
                                         <a href="shop-details.html">
                                             <img src="assets/img/products/home_shop_thumb01.png" alt="img">
                                             <span class="discount"> -20%</span>
                                         </a>
                                     </div>
                                     <div class="home-shop-content">
                                         <div class="shop-item-cat"><a href="#">Nutrition</a></div>
                                         <h4 class="title"><a href="shop-details.html">Box Full of Muscles</a></h4>
                                         <span class="home-shop-price">$85.99</span>
                                         <div class="home-shop-rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                             <span class="total-rating">(20)</span>
                                         </div>
                                         <div class="shop-content-bottom">
                                             <a href="cart.html" class="cart"><i
                                                     class="flaticon-shopping-cart-1"></i></a>
                                             <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                 <div class="home-shop-item inner-shop-item">
                                     <div class="home-shop-thumb">
                                         <a href="shop-details.html">
                                             <img src="assets/img/products/home_shop_thumb02.png" alt="img">
                                         </a>
                                     </div>
                                     <div class="home-shop-content">
                                         <div class="shop-item-cat"><a href="#">Body & Fit</a></div>
                                         <h4 class="title"><a href="shop-details.html">Protein Powder 2kg</a></h4>
                                         <span class="home-shop-price">$59.99</span>
                                         <div class="home-shop-rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                             <span class="total-rating">(34)</span>
                                         </div>
                                         <div class="shop-content-bottom">
                                             <a href="cart.html" class="cart"><i
                                                     class="flaticon-shopping-cart-1"></i></a>
                                             <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                 <div class="home-shop-item inner-shop-item">
                                     <div class="home-shop-thumb">
                                         <a href="shop-details.html">
                                             <img src="assets/img/products/home_shop_thumb03.png" alt="img">
                                             <span class="discount"> -15%</span>
                                         </a>
                                     </div>
                                     <div class="home-shop-content">
                                         <div class="shop-item-cat"><a href="#">Fat Burners</a></div>
                                         <h4 class="title"><a href="shop-details.html">Amino Energy Health 2kg</a>
                                         </h4>
                                         <span class="home-shop-price">$29.99</span>
                                         <div class="home-shop-rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                             <span class="total-rating">(19)</span>
                                         </div>
                                         <div class="shop-content-bottom">
                                             <a href="cart.html" class="cart"><i
                                                     class="flaticon-shopping-cart-1"></i></a>
                                             <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                 <div class="home-shop-item inner-shop-item">
                                     <div class="home-shop-thumb">
                                         <a href="shop-details.html">
                                             <img src="assets/img/products/home_shop_thumb04.png" alt="img">
                                         </a>
                                     </div>
                                     <div class="home-shop-content">
                                         <div class="shop-item-cat"><a href="#">Protein</a></div>
                                         <h4 class="title"><a href="shop-details.html">Antiaging and Longevity</a>
                                         </h4>
                                         <span class="home-shop-price">$49.99</span>
                                         <div class="home-shop-rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                             <span class="total-rating">(12)</span>
                                         </div>
                                         <div class="shop-content-bottom">
                                             <a href="cart.html" class="cart"><i
                                                     class="flaticon-shopping-cart-1"></i></a>
                                             <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                 <div class="home-shop-item inner-shop-item">
                                     <div class="home-shop-thumb">
                                         <a href="shop-details.html">
                                             <img src="assets/img/products/home_shop_thumb05.png" alt="img">
                                             <span class="discount"> -45%</span>
                                         </a>
                                     </div>
                                     <div class="home-shop-content">
                                         <div class="shop-item-cat"><a href="#">Fat Burners</a></div>
                                         <h4 class="title"><a href="shop-details.html">SERIOUR MASS 2kg</a></h4>
                                         <span class="home-shop-price">$49.99</span>
                                         <div class="home-shop-rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                             <span class="total-rating">(19)</span>
                                         </div>
                                         <div class="shop-content-bottom">
                                             <a href="cart.html" class="cart"><i
                                                     class="flaticon-shopping-cart-1"></i></a>
                                             <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                 <div class="home-shop-item inner-shop-item">
                                     <div class="home-shop-thumb">
                                         <a href="shop-details.html">
                                             <img src="assets/img/products/home_shop_thumb06.png" alt="img">
                                         </a>
                                     </div>
                                     <div class="home-shop-content">
                                         <div class="shop-item-cat"><a href="#">Burners</a></div>
                                         <h4 class="title"><a href="shop-details.html">Whey Protein Powder</a></h4>
                                         <span class="home-shop-price">$29.99</span>
                                         <div class="home-shop-rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                             <span class="total-rating">(29)</span>
                                         </div>
                                         <div class="shop-content-bottom">
                                             <a href="cart.html" class="cart"><i
                                                     class="flaticon-shopping-cart-1"></i></a>
                                             <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="pagination-wrap">
                             <ul class="list-wrap">
                                 <li class="prv-next">
                                     <a href="shop.html"><i class="fas fa-angle-double-left"></i></a>
                                 </li>
                                 <li><a href="shop.html">1</a></li>
                                 <li><a href="shop.html" class="current">2</a></li>
                                 <li><a href="shop.html">3</a></li>
                                 <li><a href="shop.html">...</a></li>
                                 <li><a href="shop.html">10</a></li>
                                 <li class="prv-right">
                                     <a href="shop.html"><i class="fas fa-angle-double-right"></i></a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

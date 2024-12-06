<header id="home">
    <div id="header-top-fixed">
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="flaticon-layout"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo-sosa.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="section-link"><a href="/" class="section-link">Inicio</a>
                                    </li>
                                    <li><a href="{{ route('products') }}" class="section-link">Productos</a></li>
                                    <li><a href="#paroller" class="section-link">Nosotros</a></li>
                                    <li><a href="{{ route('testimonios') }}" class="section-link">Testimonios</a></li>
                                    <li><a href="{{ route('tiendas') }}" class="section-link">Nuestras Tiendas</a></li>
                                    <li><a href="/contact">Contacto</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-sm-block">
                                <ul>
                                    <li class="header-shop-cart">
                                        <a href="#" class="cart-count"><i class="flaticon-shopping-cart"></i>
                                            <span class="mini-cart-count">2</span>
                                        </a>
                                        <div class="header-mini-cart">
                                            <ul class="woocommerce-mini-cart cart_list product_list_widget list-wrap">
                                                <li class="woocommerce-mini-cart-item d-flex align-items-center">
                                                    <a href="#" class="remove remove_from_cart_button">×</a>
                                                    <div class="mini-cart-img">
                                                        <img src="assets/img/products/cart_p01.jpg" alt="Product">
                                                    </div>
                                                    <div class="mini-cart-content">
                                                        <h4 class="product-title"><a href="shop-details.html">Antiaging
                                                                and Longevity</a></h4>
                                                        <div class="mini-cart-price">1 ×
                                                            <span class="woocommerce-Price-amount amount">$49</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="woocommerce-mini-cart-item d-flex align-items-center">
                                                    <a href="#" class="remove remove_from_cart_button">×</a>
                                                    <div class="mini-cart-img">
                                                        <img src="assets/img/products/cart_p02.jpg" alt="Product">
                                                    </div>
                                                    <div class="mini-cart-content">
                                                        <h4 class="product-title"><a href="shop-details.html">Branched
                                                                Chain Amino Acids</a></h4>
                                                        <div class="mini-cart-price">2 ×
                                                            <span class="woocommerce-Price-amount amount">$69</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="woocommerce-mini-cart__total">
                                                <strong>Subtotal:</strong>
                                                <span class="woocommerce-Price-amount">$149</span>
                                            </p>
                                            <p class="checkout-link">
                                                <a href="cart.html" class="button wc-forward">View cart</a>
                                                <a href="checkout.html" class="button checkout wc-forward">Checkout</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="header-search"><a href="#"><i class="flaticon-search"></i></a></li>
                                    <li class="offCanvas-btn d-none d-xl-block"><a href="#"
                                            class="navSidebar-button"><i class="flaticon-layout"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <nav class="menu-box">
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <div class="nav-logo">
                <a href="index.html"><img src="{{ asset('assets/img/logo-sosa.png') }}" alt="Logo"></a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="menu-backdrop"></div>
    <!-- End Mobile Menu -->

    <!-- header-search -->
    <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" placeholder="Enter your keyword...">
                                <button class="search-btn"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-backdrop"></div>
    <!-- header-search-end -->

    <!-- offCanvas-start -->
    <div class="offCanvas-wrap">
        <div class="offCanvas-toggle"><img src="assets/img/icons/close.png" alt="icon"></div>
        <div class="offCanvas-body">
            <div class="offCanvas-content">
                <h3 class="title">Getting all of the <span>Nutrients</span> you need simply cannot be done without
                    supplements.</h3>
                <p>Nam libero tempore, cum soluta nobis eligendi cumque quod placeat facere possimus assumenda omnis
                    dolor repellendu sautem temporibus officiis</p>
            </div>
            <div class="offcanvas-contact">
                <h4 class="number">+1 599 162 4545</h4>
                <h4 class="email">suxnix@gmail.com</h4>
                <p>5689 Lotaso Terrace, Culver City, <br> CA, United States</p>
                <ul class="offcanvas-social list-wrap">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="offCanvas-overlay"></div>
    <!-- offCanvas-end -->

</header>
<!-- header-area-end -->

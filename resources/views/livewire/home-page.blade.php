   <!-- main-area -->
   <main class="main-area fix">

       <!-- banner-area -->
       <section class="banner-area">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-10">
                       <div class="banner-content text-center">
                           <!-- Subtítulo breve o slogan -->
                           <p class="banner-caption">Productos Naturales Sosa</p>

                           <!-- Título principal llamativo -->
                           {{-- <h2 class="title">Descubre la Fuerza de la Naturaleza</h2> --}}

                           <!-- Botón de llamada a la acción -->
                           <a href="shop.html" class="btn btn-two">Nuestros Productos</a>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12">
                       <div class="banner-images text-center">
                           <img src="assets/img/banner/inicio.png" alt="img" class="main-img">
                           <img src="assets/img/banner/banner_round_bg.png" alt="img" class="bg-shape">
                       </div>
                   </div>
               </div>
           </div>
           <div class="banner-shape one">
               <img src="assets/img/banner/banner_shape01.png" alt="shape" class="wow bannerFadeInLeft"
                   data-wow-delay=".2s" data-wow-duration="2s">
           </div>
           <div class="banner-shape two">
               <img src="assets/img/banner/banner_shape02.png" alt="shape" class="wow bannerFadeInRight"
                   data-wow-delay=".2s" data-wow-duration="2s">
           </div>
           <div class="banner-shape three">
               <img src="assets/img/banner/banner_shape03.png" alt="shape" class="wow bannerFadeInDown"
                   data-wow-delay=".2s" data-wow-duration="2s">
           </div>
           <div class="banner-shape four">
               <img src="assets/img/banner/banner_shape04.png" alt="shape" class="wow bannerFadeInDown"
                   data-wow-delay=".2s" data-wow-duration="2s">
           </div>
       </section>
       <!-- productos nuevos  -->
       <section class="home-shop-area">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="brand-title text-center mb-50">
                           <!-- Título atractivo para resaltar las marcas -->
                           <p class="title">Nuevos Productos</p>

                       </div>
                   </div>
               </div>
               <div class="row home-shop-active">
                   @foreach ($produts_onsale as $produt_onsale)
                       <div class="col-xl-3">
                           <div class="home-shop-item">
                               <div class="home-shop-thumb">

                                   <img src="{{ url('storage', $produt_onsale->images[0]) }}" alt="">
                                   <span class="discount"> -15%</span>
                                   </a>
                                   <div class="shop-thumb-shape"></div>
                               </div>
                               <div class="home-shop-content">
                                   <h4 class="title"><a href="/products/{{ $produt_onsale->slug }}">
                                           {{ $produt_onsale->name }} </a></h4>
                                   <span class="home-shop-price">S/. {{ $produt_onsale->price }}</span>
                                   <div class="home-shop-rating">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star-half-alt"></i>
                                       <span class="total-rating">(30)</span>
                                   </div>
                                   <div class="shop-content-bottom">
                                       <a href="cart.html" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                       <a href="/products/{{ $produt_onsale->slug }}" class="btn btn-two">Comprar
                                           ahora</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach

               </div>
           </div>
           <!-- brand-area -->
           <div class="brand-area">
               <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="brand-title text-center mb-50">
                               <!-- Título atractivo para resaltar las marcas -->
                               <p class="title">Marcas Naturales de Confianza en Sosa EIRL</p>
                               <p class="subtitle">Encuentra productos de alta calidad de marcas como
                                   <strong>Inpra</strong> y muchas más
                               </p>
                           </div>
                       </div>
                   </div>
                   <div class="row brand-active">
                       @foreach ($brands as $brand)
                           <div class="col-2">
                               <div class="brand-item">
                                   <a href="#">
                                       <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}"></a>
                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
           </div>
           <!-- brand-area-end -->
       </section>
       <!-- fin de productos nuevos  -->


       <!-- features-area -->
       <section id="features" class="features-area features-bg" data-background="assets/img/bg/features_bg.jpg">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-xxl-6 col-lg-5 order-0 order-lg-2">
                       <div class="features-img wow featuresRollOut" data-wow-delay=".3s">
                           <img src="assets/img/banner/b2.png"
                               alt="Productos Bio Prost, Erk Max y Colágeno de Sosa EIRL">
                       </div>
                   </div>


                   <div class="col-xxl-6 col-lg-7">
                       <div class="features-items-wrap">
                           <div class="row justify-content-center">
                               <!-- Bio Prost -->


                               <div class="col-md-6 col-sm-8">
                                   <div class="features-item">
                                       <div class="features-icon">
                                           <i class="flaticon-tape-measure"></i>
                                       </div>
                                       <div class="features-content">
                                           <h4 class="title">Bio Prost - Cuidado Proactivo</h4>
                                           <p>Apoya la salud prostática con ingredientes naturales para una vida plena.
                                           </p>
                                       </div>
                                   </div>
                               </div>
                               <!-- Erk Max -->
                               <div class="col-md-6 col-sm-8">
                                   <div class="features-item">
                                       <div class="features-icon">
                                           <i class="flaticon-test"></i>
                                       </div>
                                       <div class="features-content">
                                           <h4 class="title">Erk Max - Energía y Vitalidad</h4>
                                           <p>Aumenta la energía y resistencia de forma natural, ideal para un estilo
                                               de vida activo.</p>
                                       </div>
                                   </div>
                               </div>
                               <!-- Colágeno -->
                               <div class="col-md-6 col-sm-8">
                                   <div class="features-item">
                                       <div class="features-icon">
                                           <i class="flaticon-weight"></i>
                                       </div>
                                       <div class="features-content">
                                           <h4 class="title">Colágeno - Juventud y Flexibilidad</h4>
                                           <p>Contribuye a la salud de la piel y articulaciones, promoviendo una
                                               apariencia fresca.</p>
                                       </div>
                                   </div>
                               </div>
                               <!-- Beneficio adicional de productos naturales -->
                               <div class="col-md-6 col-sm-8">
                                   <div class="features-item">
                                       <div class="features-icon">
                                           <i class="flaticon-abs"></i>
                                       </div>
                                       <div class="features-content">
                                           <h4 class="title">Natural y Seguro</h4>
                                           <p>Productos seleccionados con ingredientes de calidad para un cuidado
                                               integral.</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>


       <!-- features-area-end -->

       <!-- features-product -->
       <section id="paroller" class="features-products">
           <div class="container">
               <div class="features-products-wrap">
                   <div class="row justify-content-center">
                       <div class="col-lg-6 col-md-8">
                           <div class="features-products-thumb">
                               <div class="main-img">
                                   <img src="assets/img/banner/prod1.png" alt="img">
                               </div>
                               <img src="assets/img/banner/cel1.png" alt="img" class="shape-img">
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-10">
                           <div class="features-product-content">
                               <h2 class="title"><a href="shop-details.html">Cápsulas de Células Madre</a></h2>
                               <h6 class="features-product-quantity">Alta Concentración, 60 cápsulas</h6>
                               <p>Estas cápsulas están formuladas con extractos naturales para revitalizar y regenerar
                                   células, ayudando a mejorar el bienestar y vitalidad en general.</p>
                               <div class="features-product-bottom">
                                   <a href="shop-details.html" class="btn">Ver Producto</a>
                                   <span class="price">S/120.00 <span class="old-price">S/150.00</span></span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="features-products-wrap">
                   <div class="row justify-content-center">
                       <div class="col-lg-6 col-md-8">
                           <div class="features-products-thumb">
                               <div class="main-img">
                                   <img src="assets/img/banner/prod2.png" alt="img">
                               </div>
                               <img src="assets/img/banner/colest.png" alt="img" class="shape-img">
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-10">
                           <div class="features-product-content">
                               <h2 class="title"><a href="shop-details.html">Tónico para el Colesterol</a></h2>
                               <h6 class="features-product-quantity">Natural y Eficaz</h6>
                               <p>Este tónico ayuda a mantener los niveles de colesterol en equilibrio de manera
                                   natural, promoviendo una salud cardiovascular óptima.</p>
                               <div class="features-product-bottom">
                                   <a href="shop-details.html" class="btn">Ver Producto</a>
                                   <span class="price">S/90.00 <span class="old-price">S/110.00</span></span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
           <div class="fp-shapes-wrap">
               <div class="fp-shape-one">
                   <img src="assets/img/others/features_sec_shape01.png" alt="shape" class="paroller"
                       data-paroller-factor="0.25" data-paroller-factor-lg="0.20" data-paroller-factor-md="0.25"
                       data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                       data-paroller-direction="vertical">
               </div>
               <div class="fp-shape-two">
                   <img src="assets/img/others/features_sec_shape02.png" alt="shape" class="paroller"
                       data-paroller-factor="-0.25" data-paroller-factor-lg="0.20" data-paroller-factor-md="0.25"
                       data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                       data-paroller-direction="vertical">
               </div>
               <div class="fp-shape-three">
                   <img src="assets/img/others/features_sec_shape03.png" alt="shape" class="paroller"
                       data-paroller-factor="0.25" data-paroller-factor-lg="0.20" data-paroller-factor-md="0.25"
                       data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                       data-paroller-direction="vertical">
               </div>
           </div>
           <div class="fp-circle one"></div>
           <div class="fp-circle two"></div>
           <div class="fp-circle three"></div>
           <div class="fp-circle four"></div>
           <div class="fp-circle five"></div>
       </section>
       <!-- features-product-end -->

       <!-- shop-area -->
       <section class="home-shop-area">
           <div class="container">
               <div class="row home-shop-active">
                   @foreach ($productos_destacado as $producto_destacado)
                       <div class="col-xl-3">
                           <div class="home-shop-item">
                               <div class="home-shop-thumb">
                                   <a href="shop-details.html">
                                       <img src="{{ url('storage', $producto_destacado->images[0]) }}"
                                           alt="{{ $producto_destacado->name }}">
                                       <span class="discount"> -15%</span>
                                   </a>
                                   <div class="shop-thumb-shape"></div>
                               </div>
                               <div class="home-shop-content">
                                   <h4 class="title"><a href="shop-details.html">Box Full of Muscles</a></h4>
                                   <span class="home-shop-price">$85.99</span>
                                   <div class="home-shop-rating">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star-half-alt"></i>
                                       <span class="total-rating">(30)</span>
                                   </div>
                                   <div class="shop-content-bottom">
                                       <a href="cart.html" class="cart"><i
                                               class="flaticon-shopping-cart-1"></i></a>
                                       <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach


               </div>
           </div>
       </section>
       <!-- shop-area-end -->

       <!-- video-area -->
       <div class="video-area video-bg" data-background="assets/img/bg/video_bg.jpg">
           <div class="video-bg-overlay"></div>
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="video-btn">
                           <a href="https://www.youtube.com/watch?v=HQfF5XRVXjU" class="popup-video ripple-white"><i
                                   class="fas fa-play"></i></a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="video-shape one"><img src="assets/img/others/video_shape01.png" alt="shape"></div>
           <div class="video-shape two"><img src="assets/img/others/video_shape02.png" alt="shape"></div>
       </div>
       <!-- video-area-end -->

       <!-- fact-area -->
       {{-- <section class="fact-area">
           <div class="container">
               <div class="fact-items-wrapper">
                   <div class="row g-0 justify-content-center">
                       <div class="col-lg-4 col-md-6 col-sm-9">
                           <div class="fact-item">
                               <div class="chart" data-percent="65">
                                   <span class="percentage">65<small>%</small></span>
                               </div>
                               <div class="fact-content">
                                   <h4 class="title">Active Members</h4>
                                   <span>Yes we did it asap software</span>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-9">
                           <div class="fact-item">
                               <div class="chart" data-percent="90">
                                   <span class="percentage">90<small>%</small></span>
                               </div>
                               <div class="fact-content">
                                   <h4 class="title">Projects Done</h4>
                                   <span>Yes we did it asap software</span>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-9">
                           <div class="fact-item">
                               <div class="chart" data-percent="80">
                                   <span class="percentage">80<small>%</small></span>
                               </div>
                               <div class="fact-content">
                                   <h4 class="title">Get Rewards</h4>
                                   <span>Yes we did it asap software</span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section> --}}
       <!-- fact-area-end -->

       <!-- Ingredients-area -->
       {{-- <section id="ingredient" class="ingredients-area">
           <div class="container">
               <div class="row align-items-center justify-content-center">
                   <div class="col-xl-5 col-lg-6 col-md-7">
                       <div class="ingredients-img">
                           <img src="assets/img/others/ingredients_img.png" alt="img">
                           <img src="assets/img/others/ingredients_shape.png" alt="img" class="shape">
                       </div>
                   </div>
                   <div class="col-xl-7 col-lg-9">
                       <div class="ingredients-items-wrap">
                           <div class="section-title mb-60">
                               <p class="sub-title">¿POR QUÉ ELEGIR NUESTROS PRODUCTOS?</p>
                               <h2 class="title">Suxnix Ingredients</h2>
                           </div>
                           <div class="row justify-content-center justify-content-lg-start">
                               <div class="col-md-6 col-sm-8">
                                   <div class="ingredients-item wow fadeInUp" data-wow-delay=".2s">
                                       <div class="ingredients-thumb">
                                           <img src="assets/img/others/ingredients_item01.png" alt="img">
                                       </div>
                                       <div class="ingredients-content">
                                           <h5 class="title">Helps You Stick To Your Diet</h5>
                                           <p>A thing added to something else in order to complete or enhance it.</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6 col-sm-8">
                                   <div class="ingredients-item wow fadeInUp" data-wow-delay=".3s">
                                       <div class="ingredients-thumb">
                                           <img src="assets/img/others/ingredients_item02.png" alt="img">
                                       </div>
                                       <div class="ingredients-content">
                                           <h5 class="title">Only 3g Net Carbs In Every Jar</h5>
                                           <p>A thing added to something else in order to complete or enhance it.</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6 col-sm-8">
                                   <div class="ingredients-item wow fadeInUp" data-wow-delay=".4s">
                                       <div class="ingredients-thumb">
                                           <img src="assets/img/others/ingredients_item03.png" alt="img">
                                       </div>
                                       <div class="ingredients-content">
                                           <h5 class="title">Ingredients To Fuel Your Body</h5>
                                           <p>A thing added to something else in order to complete or enhance it.</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6 col-sm-8">
                                   <div class="ingredients-item wow fadeInUp" data-wow-delay=".5s">
                                       <div class="ingredients-thumb">
                                           <img src="assets/img/others/ingredients_item04.png" alt="img">
                                       </div>
                                       <div class="ingredients-content">
                                           <h5 class="title">Clean Ingredients Only</h5>
                                           <p>A thing added to something else in order to complete or enhance it.</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section> --}}
       <!-- Ingredients-area-end -->

       <!-- formula-area -->
       <section class="formula-area formula-bg" data-background="assets/img/bg/formula_bg.jpg">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-lg-6 order-0 order-lg-2">
                       <div class="formula-img">
                           <img src="assets/img/INICIO/fond1.png" alt="img">
                       </div>
                   </div>
                   <div class="col-lg-6">
                       <div class="formula-content">
                           <div class="section-title white-title mb-50">
                               {{-- <p class="sub-title">¿POR QUÉ ELEGIR NUESTROS PRODUCTOS?</p> --}}
                               <h2 class="title">¿POR QUÉ ELEGIR NUESTROS PRODUCTOS?</h2>
                           </div>
                           <ul class="formula-list list-wrap">
                               <li>Elaborados con insumos orgánicos</li>
                               <li>Formulados con productos de primera calidad</li>
                               <li>Sin edulcorantes artificiales, lácteos, ni gluten </li>
                               <li>Formulated to reduce blood sugar intact</li>
                               <li>Organic almond Butter, Sunflower Lecithin</li>
                               <li>No energy crashes. Collagen Protein, Stevia</li>
                               <li>10G of collagen protein from grass-fed cows</li>
                           </ul>
                           <a href="contact.html" class="btn btn-two">Ir a Tienda</a>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- formula-area-end -->



       <!-- área de testimonios -->
       <section class="testimonial-area testimonial-bg" data-background="assets/img/bg/testimonial_bg.jpg">
           <div class="testimonial-overlay"></div>
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xxl-8 col-xl-9 col-lg-11">
                       <div class="testimonial-active">
                           <!-- Primer Testimonio -->
                           <div class="testimonial-item text-center">
                               <div class="testimonial-rating">
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star-half-alt"></i>
                               </div>
                               <p>“Al involucrarme más en la administración dentro del sistema de salud (MidMichigan) a
                                   lo largo de los años, había estado investigando opciones para una educación adicional
                                   que ayudara en esta transición y se ajustara a mi apretada agenda.”</p>
                               <div class="testimonial-avatar-wrap">
                                   <div class="testi-avatar-img">
                                       <img src="assets/img/others/testi_avatar01.jpg" alt="img">
                                   </div>
                                   <div class="testi-avatar-info">
                                       <h5 class="name">Janeta Cooper</h5>
                                   </div>
                               </div>
                           </div>
                           <!-- Segundo Testimonio -->
                           <div class="testimonial-item text-center">
                               <div class="testimonial-rating">
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star-half-alt"></i>
                               </div>
                               <p>“Al involucrarme más en la administración dentro del sistema de salud (MidMichigan) a
                                   lo largo de los años, había estado investigando opciones para una educación adicional
                                   que ayudara en esta transición y se ajustara a mi apretada agenda.”</p>
                               <div class="testimonial-avatar-wrap">
                                   <div class="testi-avatar-img">
                                       <img src="assets/img/others/testi_avatar02.jpg" alt="img">
                                   </div>
                                   <div class="testi-avatar-info">
                                       <h5 class="name">Lempor Kooper</h5>
                                   </div>
                               </div>
                           </div>
                           <!-- Tercer Testimonio -->
                           <div class="testimonial-item text-center">
                               <div class="testimonial-rating">
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star-half-alt"></i>
                               </div>
                               <p>“Al involucrarme más en la administración dentro del sistema de salud (MidMichigan) a
                                   lo largo de los años, había estado investigando opciones para una educación adicional
                                   que ayudara en esta transición y se ajustara a mi apretada agenda.”</p>
                               <div class="testimonial-avatar-wrap">
                                   <div class="testi-avatar-img">
                                       <img src="assets/img/others/testi_avatar03.jpg" alt="img">
                                   </div>
                                   <div class="testi-avatar-info">
                                       <h5 class="name">Zonalos Neko</h5>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- área de testimonios-fin -->


       <!-- blog-post-area -->
       <section id="news" class="blog-post-area">
           <div class="container">
               <div class="blog-inner-wrapper">
                   <div class="row justify-content-center">
                       <div class="col-lg-6 col-md-10">
                           <div class="blog-posts-wrapper">
                               <div class="section-title mb-50">
                                   <p class="sub-title">.. Noticias Productos naturales Sosa ..</p>
                                   <h2 class="title">Últimas Noticias</h2>
                               </div>
                               <div class="blog-post-item">
                                   <a href="blog-details.html">
                                       <div class="blog-post-thumb"
                                           data-background="assets/img/blog/post_thumb01.jpg">
                                       </div>
                                   </a>
                                   <div class="blog-post-content">
                                       <div class="content-top">
                                           <div class="tags"><a href="#">Consejos y Trucos</a></div>
                                           <span class="date"><i class="far fa-clock"></i> Hace 12 días</span>
                                       </div>
                                       <h3 class="title"><a href="blog-details.html">¿Cuánto realmente necesitas
                                               comer?</a></h3>
                                       <div class="content-bottom">
                                           <ul class="list-wrap">
                                               <li class="user">Publicado por - <a href="#">Admin</a></li>
                                               <li class="comments"><i class="far fa-envelope"></i> 24</li>
                                               <li class="viewers"><i class="far fa-eye"></i> 77k</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <div class="blog-post-item">
                                   <a href="blog-details.html">
                                       <div class="blog-post-thumb"
                                           data-background="assets/img/blog/post_thumb02.jpg">
                                       </div>
                                   </a>
                                   <div class="blog-post-content">
                                       <div class="content-top">
                                           <div class="tags"><a href="#">Consejos y Trucos</a></div>
                                           <span class="date"><i class="far fa-clock"></i> Hace 12 días</span>
                                       </div>
                                       <h3 class="title"><a href="blog-details.html">Complementando tu dieta
                                               hacia...</a></h3>
                                       <div class="content-bottom">
                                           <ul class="list-wrap">
                                               <li class="user">Publicado por - <a href="#">Admin</a></li>
                                               <li class="comments"><i class="far fa-envelope"></i> 29</li>
                                               <li class="viewers"><i class="far fa-eye"></i> 87k</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <div class="blog-post-item">
                                   <a href="blog-details.html">
                                       <div class="blog-post-thumb"
                                           data-background="assets/img/blog/post_thumb03.jpg">
                                       </div>
                                   </a>
                                   <div class="blog-post-content">
                                       <div class="content-top">
                                           <div class="tags"><a href="#">Consejos y Trucos</a></div>
                                           <span class="date"><i class="far fa-clock"></i> Hace 12 días</span>
                                       </div>
                                       <h3 class="title"><a href="blog-details.html">Informe del mercado de
                                               suplementos dietéticos...</a></h3>
                                       <div class="content-bottom">
                                           <ul class="list-wrap">
                                               <li class="user">Publicado por - <a href="#">Admin</a></li>
                                               <li class="comments"><i class="far fa-envelope"></i> 29</li>
                                               <li class="viewers"><i class="far fa-eye"></i> 87k</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-10">
                           <div class="faq-wrapper">
                               <div class="section-title mb-50">
                                   <p class="sub-title">.. Haz una Pregunta ..</p>
                                   <h2 class="title">Obtén Todas las Respuestas</h2>
                               </div>
                               <div class="accordion" id="accordionExample">
                                   <div class="accordion-item active-item">
                                       <h2 class="accordion-header" id="headingOne">
                                           <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                               data-bs-target="#collapseOne" aria-expanded="true"
                                               aria-controls="collapseOne">
                                               <span class="count">01.</span> ¿Los ingredientes de Suxnix proporcionan
                                               una búsqueda?
                                           </button>
                                       </h2>
                                       <div id="collapseOne" class="accordion-collapse collapse show"
                                           aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                           <div class="accordion-body">
                                               Existen muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la
                                               mayoría han sufrido alteraciones de alguna forma, como humor inyectado.
                                           </div>
                                       </div>
                                   </div>
                                   <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingTwo">
                                           <button class="accordion-button collapsed" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                               aria-expanded="false" aria-controls="collapseTwo">
                                               <span class="count">02.</span> ¿Cómo editar los temas de Suxnix?
                                           </button>
                                       </h2>
                                       <div id="collapseTwo" class="accordion-collapse collapse"
                                           aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                           <div class="accordion-body">
                                               Existen muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la
                                               mayoría han sufrido alteraciones de alguna forma, como humor inyectado.
                                           </div>
                                       </div>
                                   </div>
                                   <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                           <button class="accordion-button collapsed" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                               aria-expanded="false" aria-controls="collapseThree">
                                               <span class="count">03.</span> ¿La aplicación de Suxnix es poderosa?
                                           </button>
                                       </h2>
                                       <div id="collapseThree" class="accordion-collapse collapse"
                                           aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                           <div class="accordion-body">
                                               Existen muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la
                                               mayoría han sufrido alteraciones de alguna forma, como humor inyectado.
                                           </div>
                                       </div>
                                   </div>
                                   <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingFour">
                                           <button class="accordion-button collapsed" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                               aria-expanded="false" aria-controls="collapseFour">
                                               <span class="count">04.</span> ¿La última versión es realmente
                                               poderosa?
                                           </button>
                                       </h2>
                                       <div id="collapseFour" class="accordion-collapse collapse"
                                           aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                           <div class="accordion-body">
                                               Existen muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la
                                               mayoría han sufrido alteraciones de alguna forma, como humor inyectado.
                                           </div>
                                       </div>
                                   </div>
                                   <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingFive">
                                           <button class="accordion-button collapsed" type="button"
                                               data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                               aria-expanded="false" aria-controls="collapseFive">
                                               <span class="count">05.</span> ¿Cómo rastrear mi pedido?
                                           </button>
                                       </h2>
                                       <div id="collapseFive" class="accordion-collapse collapse"
                                           aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                           <div class="accordion-body">
                                               Existen muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la
                                               mayoría han sufrido alteraciones de alguna forma, como humor inyectado.
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="blog-bg-shape one"></div>
           <div class="blog-bg-shape two"></div>
       </section>
       <!-- blog-post-area-end -->


   </main>
   <!-- main-area-end -->

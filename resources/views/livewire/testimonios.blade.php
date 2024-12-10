<div class="product-detail-wrapper">
    
       <!-- breadcrumb-area -->
       <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Testimonios</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Inicio</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Testimonios</span></li>
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

    <!-- blog-area -->
    <section class="blog-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @foreach($testimonios as $testimonio)
                        <div class="blog--post--item mb-50">
                            <div class="blog--post--thumb">
                                <img src="{{ asset('storage/' . $testimonio->imagen) }}" alt="{{ $testimonio->titulo }}">
                            </div>
                            <div class="blog--post--content blog-details-content">
                                <div class="blog--tag">
                                    <a href="#">{{ $testimonio->categoria }}</a>
                                </div>
                                <h2 class="blog--post--title">{{ $testimonio->titulo }}</h2>
                                <div class="blog--post--meta mb-20">
                                    <ul class="list-wrap">
                                        <li><span><i class="far fa-eye"></i>{{ $testimonio->vistas }} Views</span></li>
                                        <li><a href="#"><i class="far fa-comments"></i>{{ $testimonio->comentarios_count }} Comments</a></li>
                                        <li><span><i class="far fa-calendar-alt"></i>{{ $testimonio->created_at->format('jS F Y') }}</span></li>
                                    </ul>
                                </div>
                                <div class="post-text">
                                    {!! $testimonio->contenido !!}
                                </div>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                    @endforeach

                    {{ $testimonios->links() }}
                </div>
                <div class="col-lg-4 col-md-7">
                    <aside class="blog-sidebar pl-20">
                        <!-- Search widget -->
                        <div class="widget mb-40">
                            <div class="sidebar-title mb-25">
                                <h3 class="title">Search Objects</h3>
                            </div>
                            <div class="sidebar-search-form position-relative">
                                <input type="text" wire:model.debounce.300ms="search" placeholder="Search your keyword...">
                                <button><i class="fas fa-search"></i></button>
                            </div>
                        </div>

                        <!-- Categories widget -->
                        <div class="widget mb-40">
                            <div class="sidebar-title mb-25">
                                <h3 class="title">Categories</h3>
                            </div>
                            <div class="sidebar-cat">
                                <ul class="list-wrap">
                                    {{-- @foreach($categorias as $categoria) --}}
                                        {{-- <li><a href="#">{{ $categoria->nombre }} <span>
                                            {{ $categoria->testimonios_count }}</span></a></li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>

                        <!-- Add more widgets as needed -->

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
</div>

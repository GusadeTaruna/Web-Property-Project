@extends('layouts.service-layout')


@section('content')
<header class="header">
    <div id="nav-container">

        <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="/">
                <img src="/img/logo/logo-1.svg" alt="" class="logo-nav">
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-end fixed-nav" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <!-- Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home my-auto icon-responsive"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/services"><i class="fas fa-user-friends my-auto icon-responsive"></i> Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Listing</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us"><i class="fas fa-phone my-auto icon-responsive"></i> Contact Us</a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <div class="header-content">
            <div class="container">

                <div class="col-md-12 my-auto mr-auto text-center">
                    <h1 class="h1 h1-responsive judul">Additional Services</h1>
                </div>

            </div>
    </div>
</header>
<!-- End Header -->

<!-- Start About -->
<section id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-2 ml-auto my-md-auto mx-auto my-auto">
                <div class="swiper-button-prev mx-auto my-auto"></div>
            </div>
            <div class="col-8 col-md-8 ml-auto my-md-auto mx-auto">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                    @if ($services->isEmpty())
                        <div class="swiper-slide">
                            <div class="filter">
                                <button class="btn btn-theme filter-button active" data-rel="master">Master Planning and Concept Design</button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="filter">
                                <button class="btn btn-theme filter-button" data-rel="schematic">Schematic Development</button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="filter">
                                <button class="btn btn-theme filter-button" data-rel="detailed">Detailed Design</button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="filter">
                                <button class="btn btn-theme filter-button" data-rel="construction">Construction & Tender Drawings</button>
                            </div>
                        </div>
                    @else
                        @foreach ($services as $service)
                        
                        <div class="swiper-slide">
                            <div class="filter">
                                <button class="btn btn-theme filter-button {{ $loop->index==0 ? 'active' : '' }}" 
                                data-rel="{{ $loop->index }}">{{ $service->service_name }}</button>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-6 col-sm-3 mb-2 filter">
                        <button class="btn btn-theme filter-button active" data-rel="master">Master Planning and Concept Design</button>
                    </div>
                    <div class="col-6 col-sm-3 mb-2 filter">
                        <button class="btn btn-theme filter-button" data-rel="schematic">Schematic Development</button>
                    </div>
                    <div class="col-6 col-sm-3 mb-2 filter">
                        <button class="btn btn-theme filter-button" data-rel="detailed">Detailed Design</button>
                    </div>
                    <div class="col-6 col-sm-3 mb-2 filter">
                        <button class="btn btn-theme filter-button" data-rel="construction">Construction & Tender Drawings</button>
                    </div>
                </div> --}}
               
            </div>
            <div class="col-2 col-md-2 ml-auto my-md-auto mx-auto my-auto">
                <div class="swiper-button-next mx-auto my-auto"></div>
            </div>
        </div>
        @if ($services->isEmpty())
            <div class="col-md-12 text-center filter-content master">
                <div class="col-md-6 image m-auto mt-5 mb-3">
                    <img src="/img/services/img-1.jpg" alt="">
                </div>
                <h1 class="h1 h1-responsive mt-0">Master Planning & Concept Design</h1>
                <div class="col-md-6 m-auto">
                    <p>
                        When the project's parameters are established, the architect begins developing the initial master plan and the initial concepts which reflect the selected site, planning guidelines, project scope, budget and the Clients individual requirements.
                    </p>
                </div>
            </div>

            <div class="col-md-12 text-center none-display filter-content schematic">
                <div class="col-md-6 image m-auto mt-5 mb-3">
                    <img src="/img/services/img-3.jpg" alt="">
                </div>
                <h1 class="h1 h1-responsive mt-0">Schematic Development</h1>
                <div class="col-md-6 m-auto">
                    <p>
                        Once a Concept Design is agreed upon, the architect will refine the details and shape the selected Concept Design as well as asset in firming up the projected building costs.
                    </p>
                </div>
            </div>

            <div class="col-md-12 text-center none-display filter-content detailed">
                <div class="col-md-6 image m-auto mt-5 mb-3">
                    <img src="/img/services/img-5.jpg" alt="">
                </div>
                <h1 class="h1 h1-responsive mt-0">Detailed Design</h1>
                <div class="col-md-6 m-auto">
                    <p>
                        The project will now be progressed into the Detailed Design phase. The Schematic Design will illustrate the level of detail that allows a construction contractor to assess the full scope of the project including construction details, materials, components, systems and finishes.
                    </p>
                </div>
            </div>

            <div class="col-md-12 text-center none-display filter-content construction">
                <div class="col-md-6 image m-auto mt-5 mb-3">
                    <img src="/img/services/img-2.jpg" alt="">
                </div>
                <h1 class="h1 h1-responsive mt-0">Construction & Tender Drawings</h1>
                <div class="col-md-6 m-auto">
                    <p>
                        The project will now enter into the final drawing phase; that of Construction Drawings. These will be fully coordinated with the other essential consultants and will enable then Cost Consultant to establish the Tender documents for the contract bidding process as well as the selected contractor to build the project through to completion.
                    </p>
                </div>
            </div>
        @else
            @foreach ($services as $service)
            <div class="col-md-12 text-center filter-content {{ $loop->index }}" style="{{ $loop->index==0 ? 'display:block' : 'display:none' }}">
                <div class="col-md-6 image m-auto mt-5 mb-3">
                    <?php foreach (json_decode($service->service_img)as $picture) { ?>
                        <img src="{{ asset('/service-asset/'.$picture) }}" alt="">
                    <?php } ?>
                </div>
                {{-- <img src="/img/services/1.png" class="img-icon" alt=""> --}}
                <h1 class="h1 h1-responsive mt-0">{{ $service->service_name }}</h1>
                <div class="col-md-6 m-auto">
                    <p>
                        {{ $service->service_desc }}
                    </p>
                </div>
            </div>
            @endforeach
        @endif
        
        

        {{-- <div class="col-md-12 text-center filter-content master">
            <div class="col-md-6 image m-auto mt-5 mb-3">
                <img src="/img/services/img-1.jpg" alt="">
            </div>
            <h1 class="h1 h1-responsive mt-0">Master Planning and Concept Design</h1>
            <div class="col-md-6 m-auto">
                <p>
                    When the project's parameters are established, the architect begins developing the initial master plan and the initial concepts which reflect the selected site, planning guidelines, project scope, budget and the Clients individual requirements.
                </p>
            </div>
        </div>

        <div class="col-md-12 text-center none-display filter-content schematic">
            <div class="col-md-6 image m-auto mt-5 mb-3">
                <img src="/img/services/img-3.jpg" alt="">
            </div>
            <h1 class="h1 h1-responsive mt-0">Schematic Development</h1>
            <div class="col-md-6 m-auto">
                <p>
                    Once a Concept Design is agreed upon, the architect will refine the details and shape the selected Concept Design as well as asset in firming up the projected building costs.
                </p>
            </div>
        </div>

        <div class="col-md-12 text-center none-display filter-content detailed">
            <div class="col-md-6 image m-auto mt-5 mb-3">
                <img src="/img/services/img-5.jpg" alt="">
            </div>
            <h1 class="h1 h1-responsive mt-0">Detailed Design</h1>
            <div class="col-md-6 m-auto">
                <p>
                    The project will now be progressed into the Detailed Design phase. The Schematic Design will illustrate the level of detail that allows a construction contractor to assess the full scope of the project including construction details, materials, components, systems and finishes.
                </p>
            </div>
        </div>

        <div class="col-md-12 text-center none-display filter-content construction">
            <div class="col-md-6 image m-auto mt-5 mb-3">
                <img src="/img/services/img-2.jpg" alt="">
            </div>
            <h1 class="h1 h1-responsive mt-0">Construction & Tender Drawings</h1>
            <div class="col-md-6 m-auto">
                <p>
                    The project will now enter into the final drawing phase; that of Construction Drawings. These will be fully coordinated with the other essential consultants and will enable then Cost Consultant to establish the Tender documents for the contract bidding process as well as the selected contractor to build the project through to completion.
                </p>
            </div>
        </div> --}}

        {{-- kiri kanan --}}
        {{-- <div class="row">
            <div class="col-lg-5 col-md-5 ml-auto my-md-auto">
                <!--  Image Slider -->
    
                <div class="image">
                    <img src="/img/services/1.png" alt="">
                </div>
    
                <!--  Image Slider -->
    
            </div>
    
            <div class="col-md-1"></div>
    
            
    
            <div class="col-md-6 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Master Planning and Concept Design</h1>
                <p>
                    When the project's parameters are established, the architect begins developing the initial master plan and the initial concepts which reflect the selected site, planning guidelines, project scope, budget and the Clients individual requirements.
                </p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Schematic Development</h1>
                <p>
                    Once a Concept Design is agreed upon, the architect will refine the details and shape the selected Concept Design as well as asset in firming up the projected building costs. 
                </p>
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-5 col-md-5 ml-auto my-md-auto">
    
                <div class="image">
                    <img src="/img/services/2.png" alt="">
                </div>
    
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-5 ml-auto my-md-auto">
                <!--  Image Slider -->
    
                <div class="image">
                    <img src="/img/services/3.png" alt="">
                </div>
    
                <!--  Image Slider -->
    
            </div>
    
            <div class="col-md-1"></div>
    
            
    
            <div class="col-md-6 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Detailed Design</h1>
                <p>
                    The project will now be progressed into the Detailed Design phase. The Schematic Design will illustrate the level of detail that allows a construction contractor to assess the full scope of the project including construction details, materials, components, systems and finishes.
                </p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Construction & Tender Drawings</h1>
                <p>
                    The project will now enter into the final drawing phase; that of Construction Drawings. These will be fully coordinated with the other essential consultants and will enable then Cost Consultant to establish the Tender documents for the contract bidding process as well as the selected contractor to build the project through to completion.
                </p>
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-5 col-md-5 ml-auto my-md-auto">
    
                <div class="image">
                    <img src="/img/services/4.png" alt="">
                </div>
    
            </div>
        </div> --}}
       

    </div>
</section>
<!-- End About -->

<a href="https://wa.me/+6281337104119" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>

<!--  Footer Section -->

<footer class="mt-auto py-4">
    <div class="text-center">
      <small>&copy; Equatorial Property. All rights reserved</small>
    </div>
</footer>


<!--  Footer Section -->
@endsection
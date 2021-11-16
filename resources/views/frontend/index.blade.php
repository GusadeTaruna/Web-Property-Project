@extends('layouts.homepage-layout')


@section('content')
<!-- Start Header -->
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
                    <a class="nav-link active" href="/"><i class="fas fa-home my-auto icon-responsive"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services"><i class="fas fa-user-friends my-auto icon-responsive"></i> Services</a>
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
<div class="header">
    <div class="header-content">
        <div class="container animatable fadeInUp">

            <div class="col-md-12 my-auto mr-auto text-center">
                @if ($homepage_data->isEmpty())
                    <h4 class="h5 sub-judul">Here you can find luxury high end properties</h4>
                    <h1 class="h1 h1-responsive judul">Find Your Ideal Land or Home</h1>
                @else
                    @foreach ($homepage_data as $data)
                        @if (is_null($data->header_sub_title))
                            <h4 class="h5 sub-judul">Here you can find luxury high end properties</h4>
                        @else
                            <h4 class="h5 sub-judul">{{ $data->header_sub_title }}</h4>
                        @endif
                        
                        @if (is_null($data->header_title))
                            <h1 class="h1 h1-responsive judul">Find Your Ideal Land or Home</h1>
                        @else
                            <h1 class="h1 h1-responsive judul">{{ $data->header_title }}</h1>
                        @endif
                    @endforeach
                @endif
                
            </div>

            <!-- Start Search Bar -->

            <div id="search-section">
                <form class="form" method="get" action="{{ route('search.property') }}">
                <div class="col-lg-10 mx-auto search-area shadow">
                        <div class="row">
                            <div class="col-md-4 my-auto">
                                <input class="w-100 form-control" type="text" name="location" id="location" placeholder="Location" onkeyup="success()">
                            </div>
                            <div class="col-md-4 my-auto">
                                <select name="type" id="select-type" class="w-100 form-control">
                                    <option selected disabled value="0">Listing</option>
                                    <option value="1">Property</option>
                                    <option value="2">Land</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-3 ml-auto my-auto">
                                <button class="btn btn-advance shadow-none" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-sliders-h my-auto primary"></i><br><span class="primary">Advanced Search</span></button>
                            </div>
                        
                            <div class="col-lg-2 col-md-3 ml-auto my-auto">
                                <button class="btn btn-theme" type="submit" id="search-btn" disabled>Search</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>

            <!-- End Search Bar -->

        </div>
    </div>
    <div id="banner-image">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if ($homepage_data->isEmpty())
                    <div class="swiper-slide">
                        <img src="img/image-5.jpg"/>
                    </div>
                    <div class="swiper-slide">
                        <img src="img/image-6.jpg"/>
                    </div>
                @else
                    @foreach ($homepage_data as $data)
                        @if (is_null(json_decode($data->header_image)))
                            <div class="swiper-slide">
                                <img src="img/image-5.jpg"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="img/image-6.jpg"/>
                            </div>
                        @else
                            <?php foreach (json_decode($data->header_image)as $picture) { ?>
                                <div class="swiper-slide">
                                    <img src="{{ asset('/home-asset/'.$picture) }}"/>
                                </div>
                            <?php } ?>
                        @endif
                    @endforeach
                @endif
                
            </div>
        </div> 
    
        
    </div>
</div>
<!-- End Header -->

<!--  Start Property Section -->

<section id="property-section">
    <div class="container-property animatable fadeInUp">
        <h3 class="mb-3 text-center">Discover Our Recent Listings</h3>
        <h6 class="h6 m-0 text-center">Discover some of the recent listings from us</h6>

        <!--  Property Slider -->
        <div class="row">
            <div class="col-lg-1 p-0">
                <div class="swiper-button-prev"></div>
            </div>
            
            
            <div class="col-11 col-md-12 col-lg-10 p-0 mx-auto">
                <div id="property-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($listing_data as $listing)
                            <div class="swiper-slide">
                                <a href={{ route('property-detail',$listing->property_code) }}>
                                    <div class="property-list shadow">
                                        <div class="image">
                                            <img src="{{ asset('/property-image/'.array_values(json_decode($listing->property_image))[0]) }}" alt="">
                                        </div>
                                        <div class="text-left">
                                            <h4 class="h5 item-name">[{{ $listing->property_code }}] {{ ucwords(strtolower($listing->property_name)) }}</h4>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="item">
                                                <p class="h6 mb-2 m-0">{{ ucwords(strtolower($listing->property_location)) }}</p>
                                            </div>
                                        </div>
    
                                        <ul id="property-ul">
                                            @if ($listing->property_type == 1)
                                                <li class="property-features">
                                                    <i class="fas fa-bed"></i>
                                                    <p>{{ $listing->bed_qty }} Bedroom</p>
                                                </li>
                                                <li class="property-features">
                                                    <i class="fas fa-bath"></i>
                                                    <p>{{ $listing->bath_qty }} Bathroom</p>
                                                </li>
                                                <li class="property-features">
                                                    <i class="fas fa-warehouse"></i>
                                                    <p>{{ $listing->garage_qty }} Garage</p>
                                                </li>
										    @endif
                                            <li class="property-features">
                                                <i class="fas fa-pencil-ruler"></i>
                                                <p>{{  number_format($listing->site_area,0,'','.') }} sqm</p>
                                            </li>
                                        </ul>
    
                                        <hr>
    
                                        <div class="d-flex justify-content-between mb-2 my-auto">
                                            <div class="item">
                                                @if ($listing->currency=="POI")
                                                    <span class="price">Price on Inquiry</span>
                                                @else
                                                    <span class="price">{{ $listing->currency }} {{ number_format($listing->price,0,'','.') }}</span>
                                                @endif
                                            </div>
                                            <div class="item">
                                                <button class="btn-property">More Details</button>
                                            </div>
                                        </div>
    
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            
    
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <a href="/property-list">Find More Project  <i class="fas fa-long-arrow-alt-right margin-left mr-3"></i> </a>
                </div>
            </div>

            <div class="col-lg-1 p-0">
                <div class="swiper-button-next"></div>
            </div>
        </div>

        

        <!--  Property Slider -->
    </div>
</section>
<!--  End Property Section -->

<!--  Hero Banner -->
<section id="hero-banner">
    <div class="container animatable fadeInUp">
        <div class="row">
            <div class="col-md-5 my-auto mr-auto">
                @if ($homepage_data->isEmpty())
                    <h1 class="h1 h1-responsive">Create or Find Your Dream Project Land or Home.</h1>
                    <p>Equatorial Property is a team of specialists living and working in Bali for over 30 years , who are ready to assist you to find the ideal site for your vision , from residential villas, to larger scale hospitality projects let us help you to find the perfect property.</p>
                @else
                    @foreach ($homepage_data as $data)
                        @if (is_null($data->left_section_title))
                            <h1 class="h1 h1-responsive">Create or Find Your Dream Project Land or Home.</h1>
                        @else
                            <h1 class="h1 h1-responsive">{{ $data->left_section_title }}</h1>
                        @endif

                        @if (is_null($data->left_section_sub_title))
                            <p>Equatorial Property is a team of specialists living and working in Bali for over 30 years , who are ready to assist you to find the ideal site for your vision , from residential villas, to larger scale hospitality projects let us help you to find the perfect property.</p>
                        @else
                            <p>{{ $data->left_section_sub_title }}</p>
                        @endif
                    @endforeach
                @endif
                <a class="btn btn-theme-2" href="/property-list">Get Started</a>
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-6 col-md-5 ml-auto my-5">
                <div class="banner-content">
                    @if ($homepage_data->isEmpty() || is_null($homepage_data[0]['right_section_image_or_vid']))
                        <img class="img-resize" src="img/create-or-find.jpg" class="" alt="">
                    @elseif(!is_array(json_decode($homepage_data[0]['right_section_image_or_vid'])))
                        <div class="iframe-container">
                            @php
                            $string = $homepage_data[0]['right_section_image_or_vid'];
                            $link = preg_replace(
                                        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                                        $string
                                        
                                    );
                                    echo $link
                            @endphp
                        </div>
                    @else
                         @foreach ($homepage_data as $data)
                            <?php foreach (json_decode($data->right_section_image_or_vid)as $picture) { ?>
                            <img class="img-resize" src="{{ asset('/home-asset/'.$picture) }}" class="" alt="">
                            <!-- Image -->
                            <?php } ?>
                        @endforeach
                    @endif

                    {{-- <video class="video" controls>
                        <!-- Video -->
                        <source src="/video/shot2.mp4" type="video/mp4">
                    </video> --}}

                </div>
            </div>

        </div>
    </div>
</section>
<!--  Hero Banner -->

<!--  Work Section -->

<section id="work-section">
    <div class="container animatable fadeInUp">
        <h6 class="h6 color-primary m-0">Services</h6>
        <h1 class="h1 h1-responsive mb-4">Our Services</h1>
        <div class="row">
            <div class="col-1 col-md-1 p-0">
                <div class="swiper-button-prev"></div>
            </div>

            <div class="col-10 col-md-10 p-0">
                <div class="col-md-12 my-5">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="/services">
                                    <div class="card-body">
                                        <img src="/img/services/img-1.jpg" class="card-img mb-4" alt="">
                                        <h4 class="h5">Master Planning and Concept Design</h4>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="/services">
                                    <div class="card-body">
                                        <img src="/img/services/img-3.jpg" class="card-img mb-4" alt="">
                                        <h4 class="h5">Schematic Development</h4>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="/services">
                                    <div class="card-body">
                                        <img src="/img/services/img-5.jpg" class="card-img mb-4" alt="">
                                        <h4 class="h5">Detailed Design</h4>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="/services">
                                    <div class="card-body">
                                        <img src="/img/services/img-2.jpg" class="card-img mb-4" alt="">
                                        <h4 class="h5">Construction & Tender Drawings</h4>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    {{-- illustration --}}
                    {{-- <img src="/img/services/1.png" class="img-icon" alt="" style="width: 100%; height:auto">
                    <h4 class="h5 mb-4">Master Planning and Concept Design</h4> --}}
                    
                    {{-- <div class="d-flex justify-content-between">
                        <div class="service-show">
                            <img src="/img/services/1.png" class="img-icon" alt="" style="width: 100%; height:auto">
                            <h4 class="h5 mb-4">Master Planning and Concept Design</h4>
                        </div>
            
                        <div class="service-show">
                            <img src="/img/services/2.png" class="img-icon" alt="" style="width: 100%; height:auto">
                            <h4 class="h5 mb-4">Schematic Development</h4>
                        </div>
            
                        <div class="service-show">
                            <img src="/img/services/3.png" class="img-icon" alt="" style="width: 100%; height:auto">
                            <h4 class="h5 mb-4">Detailed Design</h4>
                        </div>
            
                        <div class="service-show">
                            <img src="/img/services/4.png" class="img-icon" alt="" style="width: 100%; height:auto">
                            <h4 class="h5 mb-4">Construction & Tender Drawings</h4>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-1 col-md-1 p-0">
                <div class="swiper-button-next"></div>
            </div>
        </div>

    </div>
</section>


<!--  Work Section -->

<!--  About Section -->
<section id="about-section">
    <div class="container animatable fadeInUp">
        <div class="row">
            <div class="col-md-6 my-auto">
                <div class="image">
                    @if ($homepage_data->isEmpty() || is_null($homepage_data[0]['left_section_image_or_vid']))
                        <img src="img/image-7.jpg" class="" alt="">
                    @elseif(!is_array(json_decode($homepage_data[0]['left_section_image_or_vid'])))
                        <div class="iframe-container">
                            @php
                            $string = $homepage_data[0]['left_section_image_or_vid'];
                            $link = preg_replace(
                                        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                                        $string
                                        
                                    );
                                    echo $link
                            @endphp
                        </div>
                    @else
                        @foreach ($homepage_data as $data)
                        <?php foreach (json_decode($data->left_section_image_or_vid)as $picture) { ?>
                        <img src="{{ asset('/home-asset/'.$picture) }}" class="" alt="">
                        <!-- Image -->
                        <?php } ?>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-5 col-md-6 pl-lg-5 px-4 mt-md-0 mt-5">
                <h6 class="h6 color-primary m-0">About Us</h6>
                @if ($homepage_data->isEmpty())
                    <h1 class="h1 h1-responsive mb-3">We Provide The Best Property For You</h1>
                    <p>Equatorial Property is a professional team of legal, design & build property experts, bringing you 30+ years experience in Asian real estate, covering residential, commmercial & hospitaltiy design industry. </p>
                    <p>We provide an extensive network of highly reputable professionals & services to manage all aspects of your equatorial property requirements, from the selection process, purchasing, legal & site feasibility reviews, through to complete design & build assessments with property management & guidance on suitable designated services & appropriation for your property goals.</p>
                @else
                    @foreach ($homepage_data as $data)
                        @if (is_null($data->right_section_title))
                            <h1 class="h1 h1-responsive mb-3">We Provide The Best Property For You</h1>
                        @else
                            <h1 class="h1 h1-responsive mb-3">{{ $data->right_section_title }}</h1>
                        @endif

                        @if (is_null($data->right_section_sub_title))
                            <p>Equatorial Property is a professional team of legal, design & build property experts, bringing you 30+ years experience in Asian real estate, covering residential, commmercial & hospitaltiy design industry. </p>
                            <p>We provide an extensive network of highly reputable professionals & services to manage all aspects of your equatorial property requirements, from the selection process, purchasing, legal & site feasibility reviews, through to complete design & build assessments with property management & guidance on suitable designated services & appropriation for your property goals.</p>
                        @else
                            <p>{{ $data->right_section_sub_title }}</p>
                        @endif
                    @endforeach
                @endif
                <a class="btn btn-theme-2" href="/about">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!--  About Section -->



<!--  Services Section -->

<!--  <section id="services-section">
<div class="container">
  <div class="col-md-11 mx-auto">
    <div class="d-flex justify-content-between">
      <div class="shadow service-show">
        <i class="fas fa-user"></i>
        <h4 class="h5">Make Your Dream Come True</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      
      <div class="shadow service-show">
        <i class="fas fa-desktop"></i>
        <h4 class="h5">Make Your Dream Come True</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>

      <div class="shadow service-show">
        <i class="fas fa-home"></i>
        <h4 class="h5">Make Your Dream Come True</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
  </div>
</div>

</section>
-->
<!--  Services Section -->



<!--  Feature property Section -->

{{-- <section id="feature-section">
    <div class="container animatable fadeInUp">
        <h6 class="h6 color-primary m-0">Recent</h6>
        <h1 class="h1 h1-responsive mb-4">Our Featured Properties</h1>
        <p>Our collection of properties and land parcels have been assessed and reviewed in accordance with due diligence.</p>

        <div class="col-md-11 mx-auto text-left">

            <div class="row">
                <div class="col-lg-4 col-md-5 mx-auto my-3">
                    <div class="property-list shadow">
                        <div class="image">
                            <img src="/img/image-1.jpg" alt="">
                        </div>
                        <div class="text-left">
                            <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="item">
                                <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
                            </div>
                        </div>

                        <ul id="feature-ul">
                            <li class="feature-features">
                                <i class="fas fa-bed"></i>
                                <p>4 Beds</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-bath"></i>
                                <p>3 Bath</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-warehouse"></i>
                                <p>1 Garage</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-pencil-ruler"></i>
                                <p>1200 sqm</p>
                            </li>
                        </ul>

                        <hr class="feature-hr">

                        <div class="d-flex justify-content-between mb-2 my-auto">
                            <div class="item">
                                <span class="price">$485,000</span>
                            </div>
                            <div class="item">
                                <button class="btn-property">Show Details</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-5 mx-auto my-3">
                    <div class="property-list shadow">
                        <div class="image">
                            <img src="/img/image-2.jpg" alt="">
                        </div>
                        <div class="text-left">
                            <h4 class="h5 item-name">Skyper Pool Apartment 2</h4>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="item">
                                <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
                            </div>
                        </div>

                        <ul id="feature-ul">
                            <li class="feature-features">
                                <i class="fas fa-bed"></i>
                                <p>4 Beds</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-bath"></i>
                                <p>3 Bath</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-warehouse"></i>
                                <p>1 Garage</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-pencil-ruler"></i>
                                <p>1200 sqm</p>
                            </li>
                        </ul>

                        <hr class="feature-hr">

                        <div class="d-flex justify-content-between mb-2 my-auto">
                            <div class="item">
                                <span class="price">$485,000</span>
                            </div>
                            <div class="item">
                                <button class="btn-property">Show Details</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-5 mx-auto my-3">
                    <div class="property-list shadow">
                        <div class="image">
                            <img src="/img/image-3.jpg" alt="">
                        </div>
                        <div class="text-left">
                            <h4 class="h5 item-name">Skyper Pool Apartment 3</h4>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="item">
                                <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
                            </div>
                        </div>

                        <ul id="feature-ul">
                            <li class="feature-features">
                                <i class="fas fa-bed"></i>
                                <p>4 Beds</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-bath"></i>
                                <p>3 Bath</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-warehouse"></i>
                                <p>1 Garage</p>
                            </li>
                            <li class="feature-features">
                                <i class="fas fa-pencil-ruler"></i>
                                <p>1200 sqm</p>
                            </li>
                        </ul>

                        <hr class="feature-hr">

                        <div class="d-flex justify-content-between mb-2 my-auto">
                            <div class="item">
                                <span class="price">$485,000</span>
                            </div>
                            <div class="item">
                                <button class="btn-property">Show Details</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="my-4 text-center">
                <a class="btn btn-theme" href="/property-list">Load More</a>
            </div>

        </div>
    </div>
</section> --}}

<!--  Feature property Section -->

<!--  Testimonial Section -->

{{-- <section id="testimonial-section">
    <div class="container animatable fadeInUp">
        <h6 class="h6 color-primary m-0">Testimonial</h6>
        <h1 class="h1 h1-responsive mb-4">What They Are Saying</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        <br><br>

        <div id="testimonial-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-list">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4 text-center mx-auto">
                                    <div class="image">
                                        <img src="/img/image-4.jpg" alt="">
                                    </div>
                                </div>
                                <div class="offset-lg-1 col-lg-6 col-md-8 text-left">
                                    <i class="fas fa-quote-left fa-10x"></i>
                                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <h4 class="h4 m-0">Departemen</h4>
                                    <p>Someone</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> --}}

<!--  Testimonial Section -->



<!--  Mail Section -->
<hr class="w-75 ml-auto mr-auto custom">
<section id="mail-section">
    <div class="container animatable fadeInUp">
        @if ($homepage_data->isEmpty())
            <h1 class="h1 h1-responsive mb-4">Have a question... Let us help you</h1>
        @else
            @foreach ($homepage_data as $data)
                @if (is_null($data->center_section_text))
                    <h1 class="h1 h1-responsive mb-4">Have a question... Let us help you</h1>
                @else
                    <h1 class="h1 h1-responsive mb-4">{{ $data->center_section_text }}</h1>
                @endif    
            @endforeach
        @endif
        <div class="col-md-12">
            <button class="btn btn-theme">Contact Us</button>
        </div>
        {{-- <div class="col-lg-8 col-md-11 mx-auto form shadow">
            <div class="row">
                <div class="col-md-9 my-auto">
                    <input type="text" name="" class="form-control" placeholder="Write Your Message Here">
                </div>

                <div class="col-md-3 text-right">
                    <button class="btn btn-theme">Send</button>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<!--  Mail Section -->

<a href="https://wa.me/+6281337104119" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>


<!--  Footer Section -->

<footer id="sticky-footer" class="flex-shrink-0 py-4">
    <div class="text-center">
      <small>&copy; Equatorial Properties. All rights reserved</small>
    </div>
</footer>
<!--  Footer Section -->
@endsection
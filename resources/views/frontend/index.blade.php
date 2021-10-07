@extends('layouts.homepage-layout')


@section('content')
<!-- Start Header -->
<header class="header">
    <div id="nav-container">

        <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Logo</a>

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
                        <a class="nav-link" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <div class="header-content">
            <div class="container">

                <div class="col-md-12 my-auto mr-auto text-center">
                    <h4 class="h5 sub-judul">Here you can find luxury high end property</h4>
                    <h1 class="h1 h1-responsive judul">Find Your Perfect Home</h1>
                </div>

                <!-- Start Search Bar -->

                <div id="search-section">
                    <div class="col-lg-10 mx-auto search-area shadow">
                        <div class="row">
                            <div class="col-md-3">
                                <p>Location</p>
                                <select>
                                    <option>All Cities</option>
                                    <option>Location 1</option>
                                    <option>Location 2</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <p>Type</p>
                                <select>
                                    <option>Select One</option>
                                    <option>Type 1</option>
                                    <option>Type 2</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <p>Price</p>
                                <select>
                                    <option>Average</option>
                                    <option>Max Price</option>
                                    <option>Min Price</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-3 ml-auto my-auto">
                                <button class="btn btn-advance shadow-none" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-sliders-h my-auto"></i><br> Advanced Search</button>
                            </div>
                        
                            <div class="col-lg-2 col-md-3 ml-auto my-auto">
                                <button class="btn btn-theme">Search</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Search Bar -->

            </div>
    </div>
</header>
<!-- End Header -->

<!--  Start Property Section -->

<section id="property-section">
    <div class="container">
        <h3 class="mb-3 text-center">Discover Our Featured Listings</h3>
        <h6 class="h6 m-0 text-center">Discover some of the most popular listings in Toronto based on user reviews and ratings.</h6>

        <!--  Property Slider -->

        <div id="property-slider">
            <div class="swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <a href="#">
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

                                <ul id="property-ul">
                                    <li class="property-features">
                                        <i class="fas fa-bed"></i>
                                        <p>4 Beds</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-bath"></i>
                                        <p>3 Bath</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-warehouse"></i>
                                        <p>1 Garage</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <p>1200 sqm</p>
                                    </li>
                                </ul>

                                <hr>

                                <div class="d-flex justify-content-between mb-2 my-auto">
                                    <div class="item">
                                        <span class="price">$485,000</span>
                                    </div>
                                    <div class="item">
                                        <button class="btn-property">More Details</button>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
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

                                <ul id="property-ul">
                                    <li class="property-features">
                                        <i class="fas fa-bed"></i>
                                        <p>4 Beds</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-bath"></i>
                                        <p>3 Bath</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-warehouse"></i>
                                        <p>1 Garage</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <p>1200 sqm</p>
                                    </li>
                                </ul>

                                <hr>

                                <div class="d-flex justify-content-between mb-2 my-auto">
                                    <div class="item">
                                        <span class="price">USD 485,000</span>
                                    </div>
                                    <div class="item">
                                        <button class="btn-property">More Details <i class="fas fa-chevron-right ml-3"></i></button>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
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

                                <ul id="property-ul">
                                    <li class="property-features">
                                        <i class="fas fa-bed"></i>
                                        <p>4 Beds</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-bath"></i>
                                        <p>3 Bath</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-warehouse"></i>
                                        <p>1 Garage</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <p>1200 sqm</p>
                                    </li>
                                </ul>

                                <hr>

                                <div class="d-flex justify-content-between mb-2 my-auto">
                                    <div class="item">
                                        <span class="price">USD 485,000</span>
                                    </div>
                                    <div class="item">
                                        <button class="btn-property">More Details <i class="fas fa-chevron-right ml-3"></i></button>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <div class="property-list shadow">
                                <div class="image">
                                    <img src="/img/image-4.jpg" alt="">
                                </div>
                                <div class="text-left">
                                    <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="item">
                                        <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
                                    </div>
                                </div>

                                <ul id="property-ul">
                                    <li class="property-features">
                                        <i class="fas fa-bed"></i>
                                        <p>4 Beds</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-bath"></i>
                                        <p>3 Bath</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-warehouse"></i>
                                        <p>1 Garage</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <p>1200 sqm</p>
                                    </li>
                                </ul>

                                <hr>

                                <div class="d-flex justify-content-between mb-2 my-auto">
                                    <div class="item">
                                        <span class="price">Rp.3,900,000,000</span>
                                    </div>
                                    <div class="item">
                                        <button class="btn-property">More Details <i class="fas fa-chevron-right ml-3"></i></button>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <div class="property-list shadow">
                                <div class="image">
                                    <img src="/img/image-5.jpg" alt="">
                                </div>
                                <div class="text-left">
                                    <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="item">
                                        <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
                                    </div>
                                </div>

                                <ul id="property-ul">
                                    <li class="property-features">
                                        <i class="fas fa-bed"></i>
                                        <p>4 Beds</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-bath"></i>
                                        <p>3 Bath</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-warehouse"></i>
                                        <p>1 Garage</p>
                                    </li>
                                    <li class="property-features">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <p>1200 sqm</p>
                                    </li>
                                </ul>

                                <hr>

                                <div class="d-flex justify-content-between mb-2 my-auto">
                                    <div class="item">
                                        <span class="price">485,000</span>
                                    </div>
                                    <div class="item">
                                        <button class="btn-property">More Details <i class="fas fa-chevron-right ml-3"></i></button>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-right">
            <a href="#">Find More Project  <i class="fas fa-long-arrow-alt-right margin-left"></i> </a>
        </div>

        <!--  Property Slider -->
    </div>
</section>
<!--  End Property Section -->

<!--  Hero Banner -->
<section id="hero-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-5 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Find Your Next Perfect Place To Live.</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <button class="btn btn-theme-2">Get Started</button>
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-6 col-md-5 ml-auto my-5">
                <div class=".banner-content">
                    <!-- <img class="img-resize" src="/img/image-2.jpg" class="" alt=""> -->
                    <!-- Image -->

                    <video class="video" controls>
                        <!-- Video -->
                        <source src="/video/shot2.mp4" type="video/mp4">
                    </video>

                </div>
            </div>

        </div>
    </div>
</section>
<!--  Hero Banner -->

<!--  Work Section -->

<section id="work-section">
    <div class="container">
        <h6 class="h6 color-primary m-0">Work</h6>
        <h1 class="h1 h1-responsive mb-4">How It Work</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        <div class="d-flex justify-content-between my-5">
            <div class="service-show">
                <i class="fas fa-search"></i>
                <h4 class="h5 mb-4">Title 1</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.consectetur adipiscing elit adipiscing elit</p>
            </div>

            <div class="service-show">
                <i class="fas fa-people-carry"></i>
                <h4 class="h5 mb-4">Title 2</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.consectetur adipiscing elit adipiscing elit</p>
            </div>

            <div class="service-show">
                <i class="fas fa-shield-alt"></i>
                <h4 class="h5 mb-4">Title 3</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.consectetur adipiscing elit adipiscing elit</p>
            </div>
        </div>

    </div>
</section>


<!--  Work Section -->

<!--  About Section -->
<section id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-auto">
                <div class="image">
                    <img src="/img/image-5.jpg" alt="">
                </div>
            </div>

            <div class="col-lg-5 col-md-6 pl-lg-5 px-4 mt-md-0 mt-5">
                <h6 class="h6 color-primary m-0">About Us</h6>
                <h1 class="h1 h1-responsive mb-3">We Provide The Best Property For You</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <button class="btn btn-theme-2">Learn More</button>
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

<section id="feature-section">
    <div class="container">
        <h6 class="h6 color-primary m-0">Recent</h6>
        <h1 class="h1 h1-responsive mb-4">Our Featured Properties</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

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

                <div class="col-lg-4 col-md-5 mx-auto my-3">
                    <div class="property-list shadow">
                        <div class="image">
                            <img src="/img/image-4.jpg" alt="">
                        </div>
                        <div class="text-left">
                            <h4 class="h5 item-name">Skyper Pool Apartment 4</h4>
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
                            <img src="/img/image-5.jpg" alt="">
                        </div>
                        <div class="text-left">
                            <h4 class="h5 item-name">Skyper Pool Apartment 5</h4>
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
                            <h4 class="h5 item-name">Skyper Pool Apartment 6</h4>
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
                <button class="btn btn-theme">Load More</button>
            </div>

        </div>
    </div>
</section>

<!--  Feature property Section -->

<!--  Testimonial Section -->

<section id="testimonial-section">
    <div class="container">
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
</section>

<!--  Testimonial Section -->



<!--  Mail Section -->

<section id="mail-section">
    <div class="container">
        <h1 class="h1 h1-responsive mb-4">Have Question in mind? <br>Let us help you!</h1>
        <div class="col-lg-8 col-md-11 mx-auto form shadow">
            <div class="row">
                <div class="col-md-9 my-auto">
                    <input type="text" name="" class="form-control" placeholder="Write Your Message Here">
                </div>

                <div class="col-md-3 text-right">
                    <button class="btn btn-theme">Send</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  Mail Section -->


<!--  Footer Section -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 my-lg-auto my-4">
                <h4 class="h3">Brand</h4>
            </div>
            <div class="col-lg-2 col-md-3 col-6 my-lg-auto my-4">
                <h6 class="m-0 h6">Quick Links</h6>
                <hr>
                <ul>
                    <li><a href="#">Architecture</a></li>
                    <li><a href="#">Agency</a></li>
                    <li><a href="#">Asset</a></li>
                    <li><a href="#">Building</a></li>
                    <li><a href="#">Business Rate</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-6 my-lg-auto my-4">
                <h6 class="m-0 h6">Location</h6>
                <hr>
                <ul>
                    <li><a href="#">Location 1</a></li>
                    <li><a href="#">Location 2</a></li>
                    <li><a href="#">Location 3</a></li>
                    <li><a href="#">Location 4</a></li>
                    <li><a href="#">Location 5</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-6 my-lg-auto my-4">
                <h6 class="m-0 h6">Services</h6>
                <hr>
                <ul>
                    <li><a href="#">Service 1</a></li>
                    <li><a href="#">Service 2</a></li>
                    <li><a href="#">Service 3</a></li>
                    <li><a href="#">Service 4</a></li>
                    <li><a href="#">Service 5</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h6 class="m-0 h6">Contact</h6>
                <hr>
                <ul>
                    <li>Contact A</a></li>
                    <li>Contact B</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--  Footer Section -->
@endsection
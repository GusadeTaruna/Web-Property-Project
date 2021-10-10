@extends('layouts.about-layout')


@section('content')
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
                        <a class="nav-link" href="/"><i class="fas fa-home my-auto icon-responsive"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
                    </li>
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
                    <h1 class="h1 h1-responsive judul">About Us</h1>
                    <h4 class="h5 sub-judul">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                </div>

            </div>
    </div>
</header>
<!-- End Header -->

<!-- Start About -->
<section id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Get To Know Us Better</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-6 col-md-5 ml-auto my-md-auto">
                <!--  Image Slider -->

                <div id="about-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/image-1.jpg" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/image-2.jpg" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/image-3.jpg" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/image-4.jpg" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--  Image Slider -->

            </div>
        </div>

    </div>
</section>
<!-- End About -->


<!--  More Section -->

<section id="more-section">
    <div class="container">
        <h6 class="h6 color-primary m-0">Know more about us</h6>
        <h1 class="h1 h1-responsive mb-4">Our Mission</h1>
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

<!--  More Section -->


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
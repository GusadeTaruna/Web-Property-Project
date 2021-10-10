@extends('layouts.contact-us-layout')


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
                        <a class="nav-link" href="/"><i class="fas fa-home my-auto icon-responsive"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/contact-us"><i class="fas fa-phone my-auto icon-responsive"></i> Contact Us</a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <div class="header-content">
            <div class="container">

                <div class="col-md-12 my-auto mr-auto text-center">
                    <h1 class="h1 h1-responsive judul">Contact Us</h1>
                    <h4 class="h5 sub-judul">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                </div>

            </div>
    </div>
</header>
<!-- End Header -->

<!-- Start FAQ -->
<section id="faqs">
    <div class="container">
        <h1 class="judul">Let Us Know How We Can Help</h1>
        <p class="sub-judul">Feel free to contact us if you need some help, consultation or you have some other questions</p>
        <div class="col-md-12 mx-auto">
            <input class="form-control contact-form mb-3" type="Text" placeholder="Your Name"/>
            <input class="form-control contact-form mb-3" type="Text" placeholder="Your Email"/>
            <textarea class="form-control mb-3" rows="5" placeholder="Message..."></textarea>
            <button class="btn btn-theme w-100 mb-3" type="submit">SEND</button>
        </div>
        <hr class="mx-auto">

        <div class="col-md-12 mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-3 col-3 my-auto text-center">
                            <i class="fas fa-map-marker-alt my-auto icon-responsive"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-9 col-9">
                            <h4 class="judul-detail mt-3">Address</h4>
                            <p class="sub-detail">329 Queensberry Street, North Melbourne VIC 3051, Australia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-3 col-3 my-auto text-center">
                            <i class="fas fa-phone-alt my-auto icon-responsive"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-9 col-9">
                            <h4 class="judul-detail mt-3">Contact</h4>
                            <p class="sub-detail">Mobile : 081234567821<br>Mail : support@mail.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-3 col-3 my-auto text-center">
                            <i class="fas fa-clock my-auto icon-responsive"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-9 col-9">
                            <h4 class="judul-detail mt-3">Hour of Operation</h4>
                            <p class="sub-detail">Monday - Friday: 09:00 - 20:00<br>Sunday & Saturday: 10:30 - 22:00</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- End FAQ -->

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
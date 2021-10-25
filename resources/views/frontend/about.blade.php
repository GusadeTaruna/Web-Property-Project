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
                        <a class="nav-link" href="/services"><i class="fas fa-user-friends my-auto icon-responsive"></i> Services</a>
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
                </div>

            </div>
    </div>
</header>
<!-- End Header -->

<!-- Start About -->
<section id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 ml-auto my-md-auto">
                <!--  Image Slider -->

                <div id="about-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/about/4.jpg" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/about/3.jpg" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/about/2.jpg" alt="">
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="/img/about/1.jpg" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--  Image Slider -->

            </div>

            <div class="col-md-1"></div>

            

            <div class="col-md-5 my-auto mr-auto">
                <h1 class="h1 h1-responsive">Our Team...</h1>
                <p>
                    Equatorial Property is a professional team of legal , design & build property experts , bringing you 30+ years experience in Asian real estate, covering residential , commmercial & hospitaltiy design industry.
                    <br><br>
                    We provide an extensive network of highly reputable professionals & services to manage all aspects of your equatorial property requirements , from the selection process, purchasing , legal & site feasibility reviews, through to complete design & build assessments with property management & guidance on suitable designated services & appropriation for your property goals.
                </p>
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
        <p>
            Equatorial Property, based in Bali, Indonesia, will provide you with the best up to date advice and a broad array of design and consultancy services to help you achieve your property purchase and build goals within the SE Asian region.
            <br><br>
            We provide either partial or full services that include:
            Site selection, Site Analysis, Topographical and Geo-tech Surveys , Building Permits, Master planning , Architecture , Landscape, Lighting, Engineering, and Interior design services.
            <br><br>
            We can arrange Feasibility studies and can arrange the necessary operational documents for commercial properties and villas.
            <br><br>
            In addition Equatorial Property provides the selection of Furnishing , Fittings and Equipment plus Artwork and soft furnishings; all backed up by a full Procurement service for local or overseas delivery and installment  .
        </p>

    </div>
</section>

<!--  More Section -->

<section id="agent-section">
    <div class="container">
        <h3 class="h1 h1-responsive mb-2 text-center">Meet Our Team</h3>
    </div>
    <!--  Property Slider -->

    <div id="agent-slider">
        <div class="swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <a href="/cv/cv-david.pdf" download="cv-david.pdf">
                        <div class="card">
                            <div class="card-body shadow">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xxl-5 my-auto">
                                        <img src="/img/agent/david.jpg" alt="">
                                    </div>
                            
                                    <div class="col-md-12 col-lg-12 col-xxl-7 d-flex flex-column ">
                                        <p class="agent-name font-weight-bold mb-0 mt-2">David James</p>
                                        <p class="agent-pos">Principal Sales & Marketing</p>
                                        <div class="agent-desc mb-3">
                                            <p>David holds both a Bachelor of Arts degree from
                                                Victoria College, as well as a Bachelor of Interior
                                                Design degree, from the Royal Melbourne Institute
                                                of Technology.
                                            </p>
                                        </div>
                                        <button class="btn btn-details mt-auto">See Details</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="/cv/cv-martin.pdf" download="cv-martin.pdf">
                        <div class="card">
                            <div class="card-body shadow">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xxl-5 my-auto">
                                        <img src="/img/agent/marthin.jpg" alt="">
                                    </div>
                            
                                    <div class="col-md-12 col-lg-12 col-xxl-7 d-flex flex-column">
                                        <p class="agent-name font-weight-bold mb-0 mt-2">Marthin Gunardhy</p>
                                        <p class="agent-pos">Indonesian Architectural Representative</p>
                                        <div class="agent-desc mb-3">
                                            <p>
                                                Marthin is certified professional architect from Indonesian Institute of Architects, and a certified as ASEAN Architect from ASEAN Architect Council. In 2019 he completed his Master Degree on Urban Planning and also qualified as a Certified Greenship Professional from Green Building Council Indonesia.
                                            </p>
                                        </div>
                                        <button class="btn btn-details mt-auto">See Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="/cv/cv-mile.pdf" download="cv-mile.pdf">
                        <div class="card">
                            <div class="card-body shadow">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xxl-5 my-auto">
                                        <img src="/img/agent/miles.jpg" alt="">
                                    </div>
                            
                                    <div class="col-md-12 col-lg-12 col-xxl-7 d-flex flex-column">
                                        <p class="agent-name font-weight-bold mb-0 mt-2">Miles Humphreys</p>
                                        <p class="agent-pos">Lead Architect</p>
                                        <div class="agent-desc mb-3">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, repudiandae sequi modi mollitia, illum earum provident qui commodi ullam libero alias, hic aliquam eos exercitationem tempora est! Doloremque, libero quod?</p>
                                        </div>
                                        <button class="btn btn-details mt-auto">See Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--  Property Slider -->
    
</section>

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
@extends('layouts.service-layout')


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
                        <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/services"><i class="fas fa-user-friends my-auto icon-responsive"></i> Services</a>
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
                    <h1 class="h1 h1-responsive judul">Additional Services</h1>
                </div>

            </div>
    </div>
</header>
<!-- End Header -->

<!-- Start About -->
<section id="about-section">
    <div class="container">
        <div class="col-md-12 ml-auto my-md-auto">
            <div class="row">
                <div class="col-3 filter">
                    <button class="btn btn-theme filter-button active" data-rel="master">Master Planning and Concept Design</button>
                </div>
                <div class="col-3 filter">
                    <button class="btn btn-theme filter-button" data-rel="schematic">Schematic Development</button>
                </div>
                <div class="col-3 filter">
                    <button class="btn btn-theme filter-button" data-rel="detailed">Detailed Design</button>
                </div>
                <div class="col-3 filter">
                    <button class="btn btn-theme filter-button" data-rel="construction">Construction & Tender Drawings</button>
                </div>
            </div>
           
        </div>

        <div class="col-md-12 text-center filter-content master">
            {{-- <div class="col-md-6 image m-auto mt-5 mb-3">
                <img src="/img/services/img-placeholder.jpg" alt="">
            </div> --}}
            <img src="/img/services/1.png" class="img-icon" alt="">
            <h1 class="h1 h1-responsive mt-0">Master Planning and Concept Design</h1>
            <div class="col-md-6 m-auto">
                <p>
                    When the project's parameters are established, the architect begins developing the initial master plan and the initial concepts which reflect the selected site, planning guidelines, project scope, budget and the Clients individual requirements.
                </p>
            </div>
        </div>

        <div class="col-md-12 text-center none-display filter-content schematic">
            <img src="/img/services/2.png" class="img-icon" alt="">
            <h1 class="h1 h1-responsive mt-0">Schematic Development</h1>
            <div class="col-md-6 m-auto">
                <p>
                    Once a Concept Design is agreed upon, the architect will refine the details and shape the selected Concept Design as well as asset in firming up the projected building costs.
                </p>
            </div>
        </div>

        <div class="col-md-12 text-center none-display filter-content detailed">
            <img src="/img/services/3.png" class="img-icon" alt="">
            <h1 class="h1 h1-responsive mt-0">Detailed Design</h1>
            <div class="col-md-6 m-auto">
                <p>
                    The project will now be progressed into the Detailed Design phase. The Schematic Design will illustrate the level of detail that allows a construction contractor to assess the full scope of the project including construction details, materials, components, systems and finishes.
                </p>
            </div>
        </div>

        <div class="col-md-12 text-center none-display filter-content construction">
            <img src="/img/services/4.png" class="img-icon" alt="">
            <h1 class="h1 h1-responsive mt-0">Construction & Tender Drawings</h1>
            <div class="col-md-6 m-auto">
                <p>
                    The project will now enter into the final drawing phase; that of Construction Drawings. These will be fully coordinated with the other essential consultants and will enable then Cost Consultant to establish the Tender documents for the contract bidding process as well as the selected contractor to build the project through to completion.
                </p>
            </div>
        </div>

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
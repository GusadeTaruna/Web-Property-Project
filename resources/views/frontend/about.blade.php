@extends('layouts.about-layout')


@section('content')
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
                    <a class="nav-link active" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services"><i class="fas fa-hands-helping my-auto icon-responsive"></i> Services</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="/blog"><i class="fas fa-newspaper my-auto icon-responsive"></i> Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/facts"><i class="fas fa-info-circle my-auto icon-responsive"></i> Facts</a>
                </li>

            </ul>

        </div>
    </nav>
    <!-- End Navbar -->
</div>
<div class="header">
    <div class="header-content">
        <div class="col-md-12 my-auto mr-auto text-center">
            <h1 class="h1 h1-responsive judul">About Us</h1>
        </div>
    </div>
    <div id="banner-image">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if ($about_data->isEmpty())
                    <div class="swiper-slide">
                        <img src="img/header/6.jpg"/>
                    </div>
                    <div class="swiper-slide">
                        <img src="img/header/8.jpg"/>
                    </div>
                @else
                    @foreach ($about_data as $data)
                        @if (is_null(json_decode($data->team_header)))
                            <div class="swiper-slide">
                                <img src="img/header/6.jpg"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="img/header/8.jpg"/>
                            </div> 
                        @else
                            <?php foreach (json_decode($data->team_header)as $picture) { ?>
                                <div class="swiper-slide">
                                    <img src="{{ asset('/about-asset/'.$picture) }}"/>
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

<!-- Start About -->
<section id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 ml-auto my-md-auto">
                <!--  Image Slider -->

                <div id="about-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @if ($about_data->isEmpty())
                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/1.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/2.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/3.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/4.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/6.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/5.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/7.jpg" alt="">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="image">
                                        <img src="/img/about/8.jpg" alt="">
                                    </div>
                                </div>

                            @else
                                @foreach ($about_data as $data)
                                    @if (is_null(json_decode($data->team_img)))
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/1.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/2.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/3.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/4.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/6.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/5.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/7.jpg" alt="">
                                        </div>
                                    </div>
    
                                    <div class="swiper-slide">
                                        <div class="image">
                                            <img src="/img/about/8.jpg" alt="">
                                        </div>
                                    </div>
                                @else
                                    <?php foreach (json_decode($data->team_img)as $picture) { ?>
                                        <div class="swiper-slide">
                                            <div class="image">
                                                <img src="{{ asset('/about-asset/'.$picture) }}"/>
                                            </div>
                                        </div>
                                    <?php } ?>
                                @endif
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

                <!--  Image Slider -->

            </div>

            <div class="col-md-1"></div>

            

            <div class="col-md-5 my-auto mr-auto">
                @if ($about_data->isEmpty())
                    <h1 class="h1 h1-responsive">Our Team</h1>
                    <p>
                        Equatorial Property is a professional team of legal, design & build property experts, bringing you 30+ years experience in Asian real estate, covering residential, commmercial & hospitaltiy design industry.
                        <br><br>
                        We provide an extensive network of highly reputable professionals & services to manage all aspects of your equatorial property requirements, from the selection process, purchasing, legal & site feasibility reviews, through to complete design & build assessments with property management & guidance on suitable designated services & appropriation for your property goals.
                    </p>
                @else
                    @foreach ($about_data as $data)
                        @if (is_null($data->team_title))
                            <h1 class="h1 h1-responsive">Our Team</h1>
                        @else
                            <h1 class="h1 h1-responsive">{{ $data->team_title }}</h1>
                        @endif

                        @if (is_null($data->team_desc))
                            <p>
                                Equatorial Property is a professional team of legal, design & build property experts, bringing you 30+ years experience in Asian real estate, covering residential, commmercial & hospitaltiy design industry.
                                <br><br>
                                We provide an extensive network of highly reputable professionals & services to manage all aspects of your equatorial property requirements, from the selection process, purchasing, legal & site feasibility reviews, through to complete design & build assessments with property management & guidance on suitable designated services & appropriation for your property goals.
                            </p>
                        @else
                            <p>{{ $data->team_desc }}</p>
                        @endif

                    @endforeach
                @endif
            </div>
        </div>

    </div>
</section>
<!-- End About -->


<!--  More Section -->

<section id="more-section">
    <div class="container">
        @if ($about_data->isEmpty())
            <h1 class="h1 h1-responsive mb-4">Our Mission</h1>
            <p>
                Equatorial Property, based in Bali, Indonesia, will provide you with the best up to date advice and a broad array of design and consultancy services to help you achieve your property purchase and build goals within the SE Asian region.
                <br><br>
                We provide either partial or full services that include:
                Site selection, Site Analysis, Topographical and Geo-tech Surveys, Building Permits, Master planning, Architecture, Landscape, Lighting, Engineering, and Interior design services.
                <br><br>
                We can arrange Feasibility studies and can arrange the necessary operational documents for commercial properties and villas.
                <br><br>
                In addition Equatorial Property provides the selection of Furnishing, Fittings and Equipment plus Artwork and soft furnishings; all backed up by a full Procurement service for local or overseas delivery and installment.
            </p>
        @else
            @foreach ($about_data as $data)
                @if (is_null($data->mission_title))
                    <h1 class="h1 h1-responsive mb-4">Our Mission</h1>
                @else
                    <h1 class="h1 h1-responsive mb-4">{{ $data->mission_title }}</h1>
                @endif

                @if (is_null($data->mission_desc))
                    <p>
                        Equatorial Property, based in Bali, Indonesia, will provide you with the best up to date advice and a broad array of design and consultancy services to help you achieve your property purchase and build goals within the SE Asian region.
                        <br><br>
                        We provide either partial or full services that include:
                        Site selection, Site Analysis, Topographical and Geo-tech Surveys, Building Permits, Master planning, Architecture, Landscape, Lighting, Engineering, and Interior design services.
                        <br><br>
                        We can arrange Feasibility studies and can arrange the necessary operational documents for commercial properties and villas.
                        <br><br>
                        In addition Equatorial Property provides the selection of Furnishing, Fittings and Equipment plus Artwork and soft furnishings; all backed up by a full Procurement service for local or overseas delivery and installment.
                    </p>
                @else
                    <p>{{ $data->mission_desc }}</p>
                @endif
            @endforeach
        @endif

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
                @if ($team_data->isEmpty())
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
                                            <p class="agent-pos">Principal - Sales & Marketing</p>
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
                        <a href="/cv/cv-mile.pdf" download="cv-mile.pdf">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xxl-5 my-auto">
                                            <img src="/img/agent/miles.jpg" alt="">
                                        </div>
                                
                                        <div class="col-md-12 col-lg-12 col-xxl-7 d-flex flex-column">
                                            <p class="agent-name font-weight-bold mb-0 mt-2">Miles Humphreys</p>
                                            <p class="agent-pos">Principal - Architecture & Masterplanning & Design</p>
                                            <div class="agent-desc mb-3">
                                                <p>Miles graduated in New Zealand as an architect and has spent the bulk of his architectural career in western Europe; Scandinavia; Southern & Easten Africa prior to setting up his permanent architectural studio in Bali, Indonesia in 2007. Since then Miles has executed an array of high end resort end Hotel designs within Indonesia as a well as East Africa; Russia; Panama; Costa Rica and India. Presently he is working on projects in Mexico, Guam and the Bahamas.</p>
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
                                            <p class="agent-pos">Executive Architect</p>
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
                @else
                    @foreach ($team_data as $team)
                        <div class="swiper-slide">
                            <?php foreach (json_decode($team->agent_cv)as $file_cv) { ?>
                                <a href="{{ asset('/about-asset/cv/'.$file_cv) }}" download="{{ $file_cv }}">
                            <?php } ?>
                                <div class="card">
                                    <div class="card-body shadow">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xxl-5 my-auto">
                                                <?php foreach (json_decode($team->agent_photo)as $picture) { ?>
                                                    <img src="{{ asset('/about-asset/'.$picture) }}">
                                                <?php } ?>
                                            </div>
                                    
                                            <div class="col-md-12 col-lg-12 col-xxl-7 d-flex flex-column ">
                                                <p class="agent-name font-weight-bold mb-0 mt-2">{{ $team->agent_name }}</p>
                                                <p class="agent-pos">{{ $team->agent_title }}</p>
                                                <div class="agent-desc mb-3">
                                                    <p>{{ $team->agent_desc }}
                                                    </p>
                                                </div>
                                                <button class="btn btn-details mt-auto">See Details</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif      
            </div>
        </div>
    </div>

    <!--  Property Slider -->
    
</section>

<a href="https://wa.me/+6281337104119" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>

<!--  Footer Section -->

<footer class="mt-auto py-4">
    <div class="row">
        <div class="col-md-6 col-12 company-name">
            <small>&copy; Equatorial Property. All rights reserved</small>
        </div>
        <div class="col-md-6 col-12 social-icon">
            <div class="row">
                <div class="col-md-4 col-4">
                    <a href="https://www.facebook.com/equatoriallifestylebali/"><i class="fab fa-facebook fa-lg" style="color: white"></i></a>
                </div>
                <div class="col-md-4 col-4">
                    <a href="https://www.instagram.com/equatoriallifestylebali/"><i class="fab fa-instagram fa-lg" style="color: white"></i></a>
                </div>
                <div class="col-md-4 col-4">
                    <a href="www.linkedin.com/in/equatoriallifestylebali"><i class="fab fa-linkedin fa-lg" style="color: white"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--  Footer Section -->
@endsection
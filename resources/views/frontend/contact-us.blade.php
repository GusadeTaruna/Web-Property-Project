@extends('layouts.contact-us-layout')


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
                    <a class="nav-link" href="/"><i class="fas fa-home my-auto icon-responsive"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
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
                    <a class="nav-link active" href="/contact-us"><i class="fas fa-phone my-auto icon-responsive"></i> Contact Us</a>
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
            <h1 class="h1 h1-responsive judul">Contact Us</h1>
            <h4 class="h5 sub-judul">Allow our expert team to support your inquiries, we can advise & recommend the best locations and areas for your needs, just ask us???.</h4>
        </div>
    </div>
    <div id="banner-image">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @if ($contact_data->isEmpty())
                    <div class="swiper-slide">
                        <img src="img/image-8.jpg"/>
                    </div>
                @else
                    @foreach ($contact_data as $data)
                        @if (is_null(json_decode($data->header_img)))
                            <div class="swiper-slide">
                                <img src="img/image-8.jpg"/>
                            </div>
                        @else
                            <?php foreach (json_decode($data->header_img)as $picture) { ?>
                                <div class="swiper-slide">
                                    <img src="{{ asset('/contact-asset/'.$picture) }}"/>
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

<!-- Start FAQ -->
<section id="faqs">
    <div class="container">
        <h1 class="judul">Let us know how we can help</h1>
        <p class="sub-judul">Feel free to contact us if you need some help, consultation or you have some other questions</p>
        <div class="col-md-12 mx-auto">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('errorContact'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('errorContact') }}
                </div>
            @endif
            <form method="post" action="{{ route('contact.send') }}" enctype="multipart/form-data">
            @csrf
                <input class="form-control contact-form mb-3 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required/>
                @error('name')
                    <div class="text-danger">
                        <small>{{ $message }}<small>
                    </div>
                @enderror
                <input class="form-control contact-form mb-3 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required/>
                @error('email')
                    <div class="text-danger">
                        <small>{{ $message }}<small>
                    </div>
                @enderror
                <textarea class="form-control mb-3 @error('msg') is-invalid @enderror" rows="5" name="msg" placeholder="Message..." required>{{ old('msg') }}</textarea>
                @error('msg')
                    <div class="text-danger">
                        <small>{{ $message }}<small>
                    </div>
                @enderror
                <button class="btn btn-theme w-100 mb-3" type="submit">SEND</button>
            </form>
        </div>
        <hr class="mx-auto">

        <div class="col-md-12 mx-auto">
            <div class="row">
                <div class="col-md-4 my-auto">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-3 col-3 my-auto text-center">
                            <i class="fas fa-map-marker-alt my-auto icon-responsive"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-9 col-9">
                            <h4 class="judul-detail mt-3">Bali Office</h4>
                            @if ($contact_data->isEmpty())
                                <p class="sub-detail">Jl. Tukad Barito Timur V No.3, Renon, Denpasar Selatan, Kota Denpasar, Bali 80226</p>
                            @else
                                @foreach ($contact_data as $data)
                                    @if (is_null($data->address))
                                        <p class="sub-detail">Jl. Tukad Barito Timur V No.3, Renon, Denpasar Selatan, Kota Denpasar, Bali 80226</p>
                                    @else
                                        <p class="sub-detail">{{ $data->address }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-auto">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-3 col-3 my-auto text-center">
                            <i class="fas fa-phone-alt my-auto icon-responsive"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-9 col-9">
                            <h4 class="judul-detail mt-3">Contact</h4>
                            {{-- >Mobile : 081234567821<br> --}}
                            @if ($contact_data->isEmpty())
                                <p class="sub-detail">Mail : <br>Info@equatorial-property.com <br>Davidj@equatorial-property.com</p>
                            @else
                                @foreach ($contact_data as $data)
                                    @if (is_null($data->contact))
                                        <p class="sub-detail">Mail : <br>Info@equatorial-property.com <br>Davidj@equatorial-property.com</p>
                                    @else
                                        <p class="sub-detail">{{ $data->contact }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-auto">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-3 col-3 my-auto text-center">
                            <i class="fas fa-clock my-auto icon-responsive"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-9 col-9">
                            <h4 class="judul-detail mt-3">Operating Hours</h4>
                            @if ($contact_data->isEmpty())
                                <p class="sub-detail">Monday - Friday 9-5pm</p>
                            @else
                                @foreach ($contact_data as $data)
                                    @if (is_null($data->operation_hour))
                                        <p class="sub-detail">Monday - Friday 9-5pm</p>
                                    @else
                                        <p class="sub-detail">{{ $data->operation_hour }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- End FAQ -->

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
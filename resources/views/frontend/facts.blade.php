@extends('layouts.fact-layout')


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
                    <a class="nav-link" href="/contact-us"><i class="fas fa-phone my-auto icon-responsive"></i> Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog"><i class="fas fa-newspaper my-auto icon-responsive"></i> Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/facts"><i class="fas fa-info-circle my-auto icon-responsive"></i> Facts</a>
                </li>

            </ul>

        </div>
    </nav>
    <!-- End Navbar -->
</div>
<!-- Start About -->
<section id="about-section">
    <div class="container-lg">
        <div class="text-center header-container">
            <h1 class="judul-header">Your Equatorial Lifestyle</h1>
            <hr>
        </div>
        @if (is_null($fact))
        <div class="col-lg-12" style="height: 100vh;width:100%">
            <h1 class="text-center judul-content m-1">No content</h1>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-center category-content m-1">{{ $fact->fact_category }}</p>
                <h1 class="text-center judul-content m-1">{{ $fact->fact_title }}</h1>
                <p class="text-center category-content mb-4 mt-2">{{$fact->created_at->format('F d, Y')}}</p>
                <div class="banner-image">
                    {!! $fact->fact_content !!}
                </div>
            </div>

            {{-- <div class="col-md-1"></div>

            <div class="col-md-4 mr-auto">
                @if (!is_null($fact))
                <div class="form-group has-search mb-4">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                @endif
                @foreach ($fact_all as $data)
                <a href="{{ route('fact-detail',$data->id) }}">
                    <h1 class="text-center judul-content mb-1">{{ $data->fact_title }}</h1>
                </a>
                <p class="text-center category-content mb-2 mt-0">{{ $data->fact_category }} - <span>{{$data->created_at->format('F d, Y')}}</span></p>
                <div class="banner-image">
                    <span class="text-recomendation mb-4">{!! $data->fact_content !!}</span>
                </div>
                @endforeach
                
            </div> --}}
        </div>
        @endif

    </div>
</section>
<!-- End About -->

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
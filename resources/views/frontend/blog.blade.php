@extends('layouts.blog-layout')


@section('content')

    <!-- Start Header -->
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
							<a class="nav-link active" href="/blog"><i class="fas fa-newspaper my-auto icon-responsive"></i> Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/facts"><i class="fas fa-info-circle my-auto icon-responsive"></i> Facts</a>
						</li>

                    </ul>

                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </header>
    <!-- End Header -->

    <section id="list-article"> 
        <div class="text-center header-container">
            <h1 class="judul-header">Equatorial Life</h1>
            <hr>
        </div>
        <h1 class="text-center mb-3" style="font-size: 26px">Search Article</h1>
        <form class="form" method="get" action="{{ route('search.blog') }}">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <div class="row mb-2">
                    <div class="col-md-3 mb-3">
                        <input type="text" id="title" name="title" placeholder="Article Title" class="form-control p-1" onkeyup="successTitle()">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" id="category" name="category" placeholder="Article Category" class="form-control p-1" onkeyup="successCategory()">
                    </div>
                    <div class="col-md-3 mb-3">
                        <form class="form" id="formRecent" method="get" action="{{ route('sort.property') }}">
                            <select name="filter_by" id="filter_by"  class="form-select p-1">
                                <option value="0" selected disabled>Sort by</option>
                                <option value="most-recent">Most Recent</option>
                                <option value="most-viewed">Most Viewed</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" id="search-btn" class="btn btn-theme p-2 w-100" disabled>Search</button>
                    </div>
                </div>
                
            </div>
        </form>
        <div class="col-md-12">
            <div class="row d-flex flex-row">
                @if(session()->has('notFound'))
                    <div class="col-lg-12 col-xxl-4 col-md-5 m-auto mb-5 text-center">
                        <img src="/img/svg/no-result.svg" class="img-not-found">
                        <h1 class="text-center text-not-found">No results found</h1>
                        <a href="/blog" class="btn btn-theme w-50 btn-not-found">Reload</a>
                    </div>
                @else
                    @foreach ($blog_all as $data)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('blog-detail',$data->id) }}">
                            <div class="article-container shadow mb-4">
                                <div class="col-md-12">
                                    <div class="image">
                                        @php
                                            preg_match_all('/<img[^>]+>/i',$data->blog_content, $result);
                                            $src = array_pop($result[0]);
                                            print_r($src);
                                        @endphp
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="category-text">
                                        @php
                                            echo ucfirst( $data->blog_category )
                                        @endphp
                                    </p>
                                    <h1>{{ $data->blog_title }}</h1>
                                    <div class="text-container">
                                        @php
                                            $content = preg_replace("/<img[^>]+\>/i", "", $data->blog_content); 
                                        @endphp
                                        {!! $content !!}
                                    </div>
                                    <div class="btn-container mt-3 mb-2 w-100">
                                        <a href="{{ route('blog-detail',$data->id) }}" class="btn btn-theme w-50">See More</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>  
        </div>
        <div class="col-md-1"></div>
        
    </section>

	<footer class="py-4">
	    <div class="text-center">
	      <small>&copy; Equatorial Property. All rights reserved</small>
	    </div>
	</footer>


    <!--  Footer Section -->

@endsection 
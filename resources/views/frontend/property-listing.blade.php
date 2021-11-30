@extends('layouts.property-listing-layout')


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
							<a class="nav-link active" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Listing</a>
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
    </header>
    <!-- End Header -->

    <section id="product-listing">
		<div class="row">
			<div class="col-lg-3 col-xxl-2">
				<div class="card">
				  <div class="card-body">
				  	<form class="form" method="get" action="{{ route('search.property') }}">
					  	<h5 class="card-title mb-4 text-center">Listing Search</h5>
					  	<!-- Code Search -->
						<select name="type" id="select-type" class="custom-select mb-3">
							<option value="0" selected disabled>Listing Type</option>
							<option value="1">Property</option>
							<option value="2">Land</option>
						</select>
						<input type="text" name="code" id="code" placeholder="Listing Code" class="form-control mb-3" onkeyup="successCode()">
						<input type="text" name="location" id="location" placeholder="Location area" class="form-control mb-3" onkeyup="successLoc()">
						<label for="price" class="text-center" style="font-weight: bold; width:100%">Price range:</label>
	                    <input type="hidden" name="minPrice" id="minPrice">
	                    <input type="hidden" name="maxPrice" id="maxPrice">
	                    <input type="text" name="" class="text-center mb-3" id="amount" readonly style="border:0; color:#a5876a; font-weight:bold;width:100%;">
	                    <div id="slider-range" class="mb-4"></div>
						<button type="submit" class="btn btn-theme w-100" id="search-btn" disabled>Search</button>	
					</form>
				  </div>
				</div>
			</div>

			<div class="col-lg-9 col-xxl-10 mt-4 mt-md-4 mt-lg-0">
				<div class="col-md-2">
					<form class="form" id="formRecent" method="get" action="{{ route('sort.property') }}">
						<select name="filter_by" id="filter_by" class="custom-select mb-3">
							<option value="0" selected disabled>Sort by</option>
							<option value="most-recent">Most Recent</option>
							<option value="most-viewed">Most Viewed</option>
							<option value="highest-price">Highest Price</option>
							<option value="lowest-price">Lowest Price</option>
						</select>
					</form>
				</div>
				<div class="col-md-12">
					@if(session()->has('errorAddInquiry'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('errorAddInquiry') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif

					@if(session()->has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif

					@if(session('inquiry'))
					<div class="card">
						<div class="card-body">
						<h5 class="card-title mb-2">Your inquiry list:</h5>
							<div class="col-md-12 p-0">
								<div class="row">
									<div class="d-flex align-items-center mb-3">
										@foreach(session('inquiry') as $id => $details)
											<p class="mb-0 mr-1 text-inquiry">[{{ $details['code'] }}] {{ ucwords(strtolower($details['name'])) }}</p>
											<a href="{{ route('remove.from.cart',$id) }}" class="btn-delete mr-3" onclick="return confirm('Are you sure to remove it from your inquiry list?');"><i class="fas fa-times"></i></a>
										@endforeach
									</div>
								</div>
							</div>
							
						<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModalCenter">Inquire now</button>
						</div>
					</div>
					@endif
					<div class="row">
						@if(session()->has('notFound'))
							<div class="col-lg-12 col-xxl-4 col-md-5 m-auto text-center">
								<img src="/img/svg/no-result.svg" class="img-not-found">
								<h1 class="text-center text-not-found">No results found</h1>
								<a href="/property-list" class="btn btn-theme w-50 btn-not-found">Reload</a>
							</div>
						@else
							@foreach ( $property as $data )
							<div class="col-lg-6 col-xxl-4 col-md-6 my-2">
								<a href={{ route('property-detail',$data->property_code) }}>
									<div class="property-list shadow">
										<div class="image">
											<div class="tag-container d-flex justify-content-start">
												{{-- <div class="tag-featured mt-2">Featured</div>
												<div class="tag-sale mt-2">For Sale</div> --}}
											</div>
											<img src="{{ asset('/property-image/'.array_values(json_decode($data->property_image))[0]) }}" alt="">
										</div>
										<div class="text-left item-header">
											<h4 class="h5 item-name">[{{ $data->property_code }}] {{ ucwords(strtolower($data->property_name)) }}</h4>
											<p class="h6 mb-3">{{ ucwords(strtolower($data->property_location)) }}</p>
										</div>

										<div class="d-flex justify-content-between">
											@if ($data->property_type == 1)
												<div class="feature-features">
													<i class="fas fa-bed"></i>
													<p>{{ $data->bed_qty }} Bedroom</p>
												</div>
												<div class="feature-features">
													<i class="fas fa-bath"></i>
													<p>{{ $data->bath_qty }} Bathroom</p>
												</div>
												<div class="feature-features">
													<i class="fas fa-warehouse"></i>
													<p>{{ $data->garage_qty }} Garage</p>
												</div>
											@endif
											
											<div class="feature-features">
												<i class="fas fa-pencil-ruler"></i>
												<p>{{  number_format($data->site_area,0,'','.') }} sqm</p>
											</div>
										</div>

										<hr class="feature-hr">
										<div class="col-md-12">
											<div class="d-flex justify-content-between">
												<p class="price">Price : </p>
												@if ($data->currency=="POI")
													<p class="price">Price on Inquiry</p>
												@else
													<p class="price">{{ $data->currency }} {{ number_format($data->price,0,'','.') }}</p>
												@endif
												
											</div>
										</div>

										<div class="col-md-12 mb-1 text-center">
											<div class="row">
												<div class="col-12 col-md-4 p-0 mb-2">
													<a class="btn btn-theme-3 inquiry-btn d-flex justify-content-center align-items-center" style="font-size: 11px" href="#" data-toggle="modal" data-target="#exampleModalCenter" data-id="[{{ $data->property_code }}] {{ ucwords(strtolower($data->property_name)) }}">Inquire now</a>
												</div>
												<div class="col-12 col-md-4 p-0 mb-2">
													<a class="btn btn-theme-3 d-flex justify-content-center align-items-center" style="font-size: 11px" href="{{ route('add.to.cart', $data->id) }}">Add to Inquiry</a>
												</div>
												<div class="col-12 col-md-4 p-0 mb-2">
													<a class="btn btn-theme-3 d-flex justify-content-center align-items-center" style="font-size: 11px;" href={{ route('property-detail',$data->property_code) }}>Show Details</a>
												</div>
											</div>
										</div>

									</div>
								</a>
							</div>
							@endforeach
							<div class="pagination justify-content-center mt-3">
								{!! $property->links() !!}
							</div>
						@endif
					</div>
				</div>
				
			</div>
		</div>
    </section>

    <!--  Footer Section -->

	<footer class="py-4">
	    <div class="text-center">
	      <small>&copy; Equatorial Property. All rights reserved</small>
	    </div>
	</footer>


    <!--  Footer Section -->

@endsection
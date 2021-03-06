@extends('layouts.property-detail-layout')


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

    <!--  Start image Section -->

    <section id="image-section">
    	<div class="col-lg-12 p-0">
    		<div id="image-slider">
				
                <div class="swiper">
                    <div class="swiper-wrapper">
						@foreach ($property as $image)
						<?php foreach (json_decode($image->property_image)as $picture) { ?>
                        <div class="swiper-slide">
							<div class="image-list">
								<div class="image">
									<img class="openImg" data-toggle="modal" data-target="#imageModalCenter" src="{{ asset('/property-image/'.$picture) }}"/>
								</div>
							</div>
                        </div>
						<?php } ?>
						@endforeach
                    </div>

					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				
                </div>
        	</div>
    	</div>
    </section>
    <!--  End image Section -->
	
    <section id="property-detail">
		@if(session()->has('errorAddInquiry'))
			<div class="container mt-3">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('errorAddInquiry') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		@endif

		@if(session()->has('success'))
			<div class="container mt-3">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		@endif
		
		@foreach ($property as $data)
		<div class="row mt-4 mb-3">
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
	    		<h1 class="judul mb-1">{{ ucwords(strtolower($data->property_name)) }}</h1>
	    		<p class="mt-0 mb-2">{{ ucwords(strtolower($data->property_location)) }}</p>
	    		<div class="d-flex justify-content-start">
					@if ($data->property_type == 1)
						<p class="mr-3"><i class="fas fa-bed"></i> {{ $data->bed_qty }} Bedroom</p>
						<p class="mr-3"><i class="fas fa-bath"></i> {{ $data->bath_qty }} Bathroom</p>
						<p class="mr-3"><i class="fas fa-warehouse"></i> {{ $data->garage_qty }} Garage</p>
					@else
					@endif
	    			<p class="mr-3"><i class="fas fa-pencil-ruler"></i> {{  number_format($data->site_area,0,'','.') }} m2</p>
					{{-- <p class="mr-3"><i class="fas fa-pencil-ruler"></i> {{  $data->site_area }} sqm</p> --}}
	    		</div>
	    	</div>
	    	<div class="col-lg-4 my-auto">
				<div class="harga-row">
					@if ($data->currency=="POI")
						<h1 class="harga">Price on Inquiry</h1>
					@else
						<h1 class="harga">{{ $data->currency }} {{ number_format($data->price,2,'.',',') }}</h1>
					@endif
					{{-- @elseif ($data->property_type == 1)
						<h1 class="harga">{{ $data->currency }} {{ number_format($data->price,0,'','.') }}</h1>
					@elseif ($data->property_type == 2)
						<h1 class="harga">{{ $data->currency }} {{ number_format($data->price,0,'','.') }} <span style="font-weight: lighter;font-size:17px">per 100m2</span> </h1>
					@endif --}}
					
				</div>
				<div class="harga-row">
					<p class="mt-0"><span style="font-weight: bold">EST</span> : USD {{ number_format($data->price_usd,2,'.',',') }}</p>	
				</div>
				<div class="inquiry-row">
					<button class="btn btn-theme mr-2 inquiry-btn" data-toggle="modal" data-target="#exampleModalCenter" data-id="[{{ $data->property_code }}] {{ ucwords(strtolower($data->property_name)) }}">Inquiry now</button>
					<a class="btn btn-theme" style="color: #fff" href="{{ route('add.to.cart', $data->id) }}">Add to inquiry</a>
				</div>
	    	</div>
		</div>

		<div class="row mb-4">
			<div class="col-lg-1"></div>
			<div class="col-lg-5">
				<div class="card atas">
				  <div class="card-body">
				    <h5 class="card-title mb-4">Property Details</h5>
				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property ID :</p>
						    	<p class="card-text">{{ $data->property_code }}</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Price :</p>
								@if (!is_numeric($data->price))
									<p class="card-text">{{ $data->price }}</p>
								@else
									<p class="card-text">{{ $data->currency }} {{ number_format($data->price,2,'.',',') }}</p>
								@endif
						    	
						    </div>
				    	</div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property Status :</p>
						    	<p class="card-text">{{ $data->property_status }}</p>
						    </div>
				    	</div>
						<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Zoning:</p>
								@if (!is_numeric($data->zoning))
									<p class="card-text">{{ $data->zoning }}</p>
								@else
									<p class="card-text">{{ $data->zoning_list->nama_tipe }}</p>
								@endif
						    </div>
				    	</div>
				    </div>

					@if ($data->property_type==1)
				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
								<p class="card-title mr-1">Bedrooms :</p>
						    	<p class="card-text">{{ $data->bed_qty }}</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Bathrooms :</p>
						    	<p class="card-text">{{ $data->bath_qty }}</p>
						    </div>
				    	</div>
				    </div>
					@endif

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property Type :</p>
						    	<p class="card-text">{{ $data->type->nama_tipe }}</p>
						    </div>
				    	</div>
				    	@if ($data->property_type==1)
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Year Built :</p>
						    	<p class="card-text">{{ $data->year_built }}</p>
						    </div>
				    	</div>
						@endif
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-lg-5">
				<div class="card atas">
					<div class="card-body">
					  <h5 class="card-title mb-4">Distance to nearest</h5>
					  <div class="row">
						  <div class="col-lg-6">
							  <div class="detail-text d-flex justify-content-start">
								  <p class="card-title mr-1">School :</p>
								  <p class="card-text">{{ $data->school_distance }} km</p>
							  </div>
						  </div>
						  <div class="col-lg-6">
							  <div class="detail-text d-flex justify-content-start">
								  <p class="card-title mr-1">Airport :</p>
								  <p class="card-text">{{ $data->airport_distance }} km</p>
							  </div>
						  </div>
					  </div>
  
					  <div class="row">
						<div class="col-lg-6">
							<div class="detail-text d-flex justify-content-start">
								<p class="card-title mr-1">Beach :</p>
								<p class="card-text">{{ $data->beach_distance }} km</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="detail-text d-flex justify-content-start">
								<p class="card-title mr-1">Fine Dining :</p>
								<p class="card-text">{{ $data->fine_dining_distance }} km</p>
							</div>
						</div>
					</div>
  
					  <div class="row">
						  <div class="col-lg-6">
							  <div class="detail-text d-flex justify-content-start">
								  <p class="card-title mr-1">Supermarket :</p>
								  <p class="card-text">{{ $data->supermarket_distance }} km</p>
							  </div>
						  </div>
						  <div class="col-lg-6">
							  <div class="detail-text d-flex justify-content-start">
								  <p class="card-title mr-1">Hospital :</p>
								  <p class="card-text">{{ $data->hospital_distance }} km</p>
							  </div>
						  </div>
					  </div>
  
					</div>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		
		<div class="row mb-4">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title mb-4">Description</h5>
				    <p class="card-text">
				      {{$data->description}}
				    </p>
				  </div>
				</div>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-lg-1"></div>
			<div class="col-lg-5">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title mb-4">Property Area</h5>
					{{-- <div class="row mb-2">
				    	<div class="col-lg-4">
				    		<div class="detail-text d-flex justify-content-start">

						    	<p class="card-title mr-1">Address :</p>
						    	<p class="card-text">Sample Address</p>
						    </div>
				    	</div>
				    	<div class="col-lg-4">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">State/County :</p>
						    	<p class="card-text">Sample State/County</p>
						    </div>
				    	</div>
				    	<div class="col-lg-4">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Area :</p>
						    	<p class="card-text">Sample Area</p>
						    </div>
				    	</div>
				    </div>
				    <div class="row mb-2">
				    	<div class="col-lg-4">
				    		<div class="detail-text d-flex justify-content-start">

						    	<p class="card-title mr-1">Country :</p>
						    	<p class="card-text">Sample Country</p>
						    </div>
				    	</div>
				    	<div class="col-lg-4">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">City :</p>
						    	<p class="card-text">Sample City</p>
						    </div>
				    	</div>
				    	<div class="col-lg-4">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Zip Code :</p>
						    	<p class="card-text">Sample Zip Code</p>
						    </div>
				    	</div>
				    </div> --}}


				    <div class="iframe-container">
						<iframe
                        width="600"
                        height="450"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCtvsXTO4yCs1lo6E-GvZOKSN_FNSCdSqY
                            &q={{ ucwords(strtolower($data->property_location)) }}">
                        </iframe>
					</div>
				  </div>
				</div>
			</div>

			
			<div class="col-lg-5">
				<div class="card mb-4">
					<div class="card-body">
						<h5 class="card-title mb-4">Video</h5>
						<div class="iframe-container">
						@php
						$string = $data->video_link;
						$link = preg_replace(
									"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
									"<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
									$string
									
								);
								echo $link
						@endphp
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="row mb-4">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				@if ($data->property_type==2)
				<div class="card mb-4">
				  <div class="card-body">
				    <h5 class="card-title mb-4">Additional Details</h5>
				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Topography Plan :</p>
						    	@if($data->topography_plan ==0) 
						    	<p class="card-text">No</p>
								@elseif($data->topography_plan ==1) 
								<p class="card-text">Yes</p>
								@endif
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Soil Test :</p>
						    	@if($data->soil_test ==0) 
						    	<p class="card-text">No</p>
								@elseif($data->soil_test ==1) 
								<p class="card-text">Yes</p>
								@endif
						    </div>
				    	</div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Slope Ratio :</p>
								<p class="card-text">{{ $data->slope_ratio }}</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Building Ratio :</p>
						    	<p class="card-text">{{ $data->building_ratio }}</p>
						    </div>
				    	</div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Rain Average (Year) :</p>
						    	<p class="card-text">{{ $data->rain_avg_year }}</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Humidity Average (Year) :</p>
						    	<p class="card-text">{{ $data->humidity_avg_year }}</p>
						    </div>
				    	</div>
				    </div>

					<div class="row">
						<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Access Road :</p>
						    	@if($data->access_road ==0) 
						    	<p class="card-text">Yes</p>
								@elseif($data->access_road ==1) 
								<p class="card-text">No</p>
								@endif
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Access Road Width :</p>
						    	<p class="card-text">{{ $data->access_road_width }}</p>
						    </div>
				    	</div>
				    </div>

					<div class="row">
						<div class="col-lg-12">
							<div class="detail-text d-flex justify-content-start">
								<p class="card-title mr-1">City Draw :</p>
								<p class="card-text">{{ $data->city_draw }}</p>
							</div>
						</div>
					</div>

					<div class="row">
				    	<div class="col-lg-12">
				    		<div class="detail-text">
						    	<p class="card-title mr-1">Surrounding Sites Description :</p>
						    	<p class="card-text">{{ $data->surrounding_sites_desc }}</p>
						    </div>
				    	</div>
				    </div>

				  </div>
				</div>
				@endif

			</div>
		</div>
		@endforeach
    </section>

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
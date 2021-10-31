@extends('layouts.property-listing-layout')


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
							<a class="nav-link" href="/services"><i class="fas fa-user-friends my-auto icon-responsive"></i> Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
						</li>
						{{-- <li class="nav-item">
							<a class="nav-link" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
						</li> --}}
						<li class="nav-item">
							<a class="nav-link" href="/contact-us"><i class="fas fa-phone my-auto icon-responsive"></i> Contact Us</a>
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
				  	<h5 class="card-title mb-3">Property Search</h5>
				  	<!-- Code Search -->
				  	<p class="card-text mt-3 mb-1">Code</p>
				    <input type="text" placeholder="Write property code here" class="form-control"/>
					<!-- Location Search -->
				    <p class="card-text mt-3 mb-1">Location</p>
					<select id="location-select" multiple="multiple">
					    <option value="location1">Location 1</option>
					    <option value="location2">Location 2</option>
					    <option value="location3">Location 3</option>
					    <option value="location4">Location 4</option>
					    <option value="location5">Location 5</option>
					    <option value="location6">Location 6</option>
					</select>
					<!-- Property Type Search -->
				    <p class="card-text mt-3 mb-1">Property Type</p>
					<select id="type-select" multiple="multiple">
					    <option value="type1">Type 1</option>
					    <option value="type2">Type 2</option>
					    <option value="type3">Type 3</option>
					</select>
					<!-- Bedrooms Search -->
				    <p class="card-text mt-3 mb-1">Bedrooms</p>
					<select id="bed-select" multiple="multiple">
					    <option value="bed1">Bedrooms 1</option>
					    <option value="bed2">Bedrooms 2</option>
					    <option value="bed3">Bedrooms 3</option>
					</select>
					<!-- Title Search -->
				    <p class="card-text mt-3 mb-1">Title</p>
					<select id="title-select" multiple="multiple">
					    <option value="title1">Title 1</option>
					    <option value="title2">Title 2</option>
					    <option value="title3">Title 3</option>
					</select>
					<!-- Minimum Price Search -->
				    <p class="card-text mt-3 mb-1">Minimum Price</p>
					<select id="minimum-select" multiple="multiple">
					    <option value="price1">Price 1</option>
					    <option value="price2">Price 2</option>
					    <option value="price3">Price 3</option>
					</select>
					<!-- Maximum Price Search -->
				    <p class="card-text mt-3 mb-1">Maximum Price</p>
					<select id="maximum-select" multiple="multiple">
					    <option value="price1">Price 1</option>
					    <option value="price2">Price 2</option>
					    <option value="price3">Price 3</option>
					</select>
				  </div>
				</div>
			</div>

			<div class="col-lg-9 col-xxl-10 mt-4 mt-md-4 mt-lg-0">
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
					@foreach ( $property as $data )
					<div class="col-lg-6 col-xxl-4 col-md-5 my-2">
						<a href={{ route('property-detail',$data->property_code) }}>
							<div class="property-list shadow">
								<div class="image">
									<div class="tag-container d-flex justify-content-start">
										<div class="tag-featured mt-2">Featured</div>
										<div class="tag-sale mt-2">For Sale</div>
									</div>
									<img src="/img/image-1.jpg" alt="">
								</div>
								<div class="text-left item-header">
									<h4 class="h5 item-name">[{{ $data->property_code }}] {{ ucwords(strtolower($data->property_name)) }}</h4>
									<p class="h6 mb-3">{{ ucwords(strtolower($data->property_location)) }}</p>
								</div>

								<div class="d-flex justify-content-between">
									<div class="feature-features">
										<i class="fas fa-bed"></i>
										<p>4 Beds</p>
									</div>
									<div class="feature-features">
										<i class="fas fa-bath"></i>
										<p>3 Bath</p>
									</div>
									<div class="feature-features">
										<i class="fas fa-warehouse"></i>
										<p>1 Garage</p>
									</div>
									<div class="feature-features">
										<i class="fas fa-pencil-ruler"></i>
										<p>1200 sqm</p>
									</div>
								</div>

								<hr class="feature-hr">
								<div class="col-md-12">
									<div class="d-flex justify-content-between">
										<p class="price">Price : </p>
										<p class="price">IDR {{ number_format($data->price,0,'','.') }}</p>
									</div>
								</div>

								<div class="col-md-12 mb-1 text-center">
									<div class="row">
										<div class="col-12 col-md-4 p-0 mb-2">
											<a class="btn btn-theme-3 inquiry-btn" style="font-size: 11px" href="#" data-toggle="modal" data-target="#exampleModalCenter" data-id="[{{ $data->property_code }}] {{ ucwords(strtolower($data->property_name)) }}">Inquire now</a>
										</div>
										<div class="col-12 col-md-4 p-0 mb-2">
											<a class="btn btn-theme-3 " style="font-size: 11px" href="{{ route('add.to.cart', $data->id) }}">Add to enquiry</a>
										</div>
										<div class="col-12 col-md-4 p-0 mb-2">
											<a class="btn btn-theme-3" style="font-size: 11px" href={{ route('property-detail',$data->property_code) }}>Show Details</a>
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
				</div>
			</div>
		</div>
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
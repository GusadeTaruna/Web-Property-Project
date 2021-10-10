@extends('layouts.property-detail-layout')


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
							<a class="nav-link active" href="/property-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
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
    </header>
    <!-- End Header -->

    <!--  Start image Section -->

    <section id="image-section">
    	<div class="col-lg-12 p-0">
    		<div id="image-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <a href="#">
                                <div class="image-list">
                                    <div class="image">
                                        <img src="/img/image-1.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#">
                                <div class="image-list">
                                    <div class="image">
                                        <img src="/img/image-2.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#">
                                <div class="image-list">
                                    <div class="image">
                                        <img src="/img/image-5.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#">
                                <div class="image-list">
                                    <div class="image">
                                        <img src="/img/image-3.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#">
                                <div class="image-list">
                                    <div class="image">
                                        <img src="/img/image-4.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#">
                                <div class="image-list">
                                    <div class="image">
                                        <img src="/img/image-5.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
        	</div>
    	</div>
    </section>
    <!--  End image Section -->

    <section id="property-detail">
		<div class="row mt-4 mb-3">
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
	    		<h1 class="judul mb-1">Luxury Family Loft by Victoria Park</h1>
	    		<p class="mt-0 mb-2">Quincy St, Brooklyn, NY, USA</p>
	    		<div class="d-flex justify-content-start">
	    			<p class="mr-3"><i class="fas fa-bed"></i> 4 Beds</p>
	    			<p class="mr-3"><i class="fas fa-bath"></i> 3 Bath</p>
	    			<p class="mr-3"><i class="fas fa-warehouse"></i> 1 Garage</p>
	    			<p class="mr-3"><i class="fas fa-pencil-ruler"></i> 1200 sqm</p>
	    		</div>
	    	</div>
	    	<div class="col-lg-2"></div>
	    	<div class="col-lg-2 my-auto">
	    		<h1 class="harga">$7,500/mo</h1>
	    	</div>
		</div>

		<div class="row mb-4">
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title mb-4">Description</h5>
				    <p class="card-text">
				      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				    </p>
				  </div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title mb-4">Property Details</h5>
				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property ID :</p>
						    	<p class="card-text">Sample Code</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Price :</p>
						    	<p class="card-text">Sample Price</p>
						    </div>
				    	</div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property Size :</p>
						    	<p class="card-text">Sample Size</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Year Built :</p>
						    	<p class="card-text">2021-01-09</p>
						    </div>
				    	</div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Bedrooms :</p>
						    	<p class="card-text">4</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Bathrooms :</p>
						    	<p class="card-text">6</p>
						    </div>
				    	</div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property Type :</p>
						    	<p class="card-text">Sample Type</p>
						    </div>
				    	</div>
				    	<div class="col-lg-6">
				    		<div class="detail-text d-flex justify-content-start">
						    	<p class="card-title mr-1">Property Status:</p>
						    	<p class="card-text">For Sale</p>
						    </div>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title mb-4">Property Location</h5>
					<div class="row mb-2">
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
				    </div>


				    <div class="iframe-container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.211572421172!2d115.1585144154124!3d-8.671419290665925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2476b9f8fdcfd%3A0x3c294beafe983b4f!2sKibarer%20Property!5e0!3m2!1sen!2sid!4v1633077247160!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
					</p>
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
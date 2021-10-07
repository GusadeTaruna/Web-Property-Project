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
                            <a class="nav-link active" href="/product-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
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

			<div class="col-lg-9 col-xxl-10">
				<div class="card">
				  <div class="card-body">
				    <div class="row">
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-1.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-2.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-3.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-4.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>

	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-2.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-3.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-4.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-1.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>

	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-4.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-1.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-2.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    <div class="col-lg-6 col-xxl-3 col-md-5 mx-auto my-2">
	                    	<a href="product-single.html">
		                        <div class="property-list shadow">
		                            <div class="image">
		                            	<div class="tag-container d-flex justify-content-start">
		                            		<div class="tag-featured mt-2">Featured</div>
		                            		<div class="tag-sale mt-2">For Sale</div>
		                            	</div>
		                                <img src="/img/image-3.jpg" alt="">
		                            </div>
		                            <div class="text-left">
		                                <h4 class="h5 item-name">Skyper Pool Apartment 1</h4>
		                            </div>
		                            <div class="d-flex justify-content-between mb-2">
		                                <div class="item">
		                                    <p class="h6 mb-2 m-0">Quincy St, Brooklyn, NY, USA</p>
		                                </div>
		                            </div>

		                            <ul id="feature-ul">
		                                <li class="feature-features">
		                                    <i class="fas fa-bed"></i>
		                                    <p>4 Beds</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-bath"></i>
		                                    <p>3 Bath</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-warehouse"></i>
		                                    <p>1 Garage</p>
		                                </li>
		                                <li class="feature-features">
		                                    <i class="fas fa-pencil-ruler"></i>
		                                    <p>1200 sqm</p>
		                                </li>
		                            </ul>

		                            <hr class="feature-hr">

		                            <div class="d-flex justify-content-between mb-2 my-auto">
		                                <div class="item">
		                                    <span class="price">$485,000</span>
		                                </div>
		                                <div class="item">
		                                    <button class="btn-property">Show Details</button>
		                                </div>
		                            </div>

		                        </div>
		                    </a>
	                    </div>
	                    
				  </div>
				</div>
				<nav aria-label="...">
				  <ul class="pagination justify-content-center">
				    <li class="page-item disabled">
				      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item active" aria-current="page">
				      <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item"><a class="page-link" href="#">4</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#">Next</a>
				    </li>
				  </ul>
				</nav>
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
@extends('layouts.faq-layout')


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
                        <a class="nav-link" href="/product-list"><i class="fas fa-stream my-auto icon-responsive"></i> Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/faq"><i class="fas fa-question-circle my-auto icon-responsive"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="fas fa-user-friends my-auto icon-responsive"></i> About Us</a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <div class="header-content">
            <div class="container">

                <div class="col-md-12 my-auto mr-auto text-center">
                    <h1 class="h1 h1-responsive judul">FAQ</h1>
                    <h4 class="h5 sub-judul">Frequently Asked Questions</h4>
                </div>

            </div>
    </div>
</header>
<!-- End Header -->

<!-- Start FAQ -->
<section id="faqs">
    <div class="container">
        <h1 class="mb-2 judul">Have a question? Please take a look here.</h1>
        <p class="mb-5 sub-judul">Cant find the answer? Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <hr>
        <div class="row">
            <div class="col-md-2 mb-3">
                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-mdb-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-mdb-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Other</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- FAQ content -->
                        <div class="accordion" id="pertanyaan1">
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Sample pertanyaan pertama? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#pertanyaan1">
                                    <div class="card-body">
                                        Sample jawaban pertama. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="pertanyaan2">
                            <div class="card">
                                <div class="card-header" id="heading2">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Sample pertanyaan kedua? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#pertanyaan2">
                                    <div class="card-body">
                                        Sample jawaban kedua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="pertanyaan3">
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Sample pertanyaan ketiga? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#pertanyaan3">
                                    <div class="card-body">
                                        Sample jawaban ketiga. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="pertanyaan4">
                            <div class="card">
                                <div class="card-header" id="heading4">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Sample pertanyaan keempat? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#pertanyaan4">
                                    <div class="card-body">
                                        Sample pertanyaan keempat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ content -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- FAQ content -->
                        <div class="accordion" id="pertanyaan1">
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Sample pertanyaan pertama? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#pertanyaan1">
                                    <div class="card-body">
                                        Sample jawaban pertama. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="pertanyaan2">
                            <div class="card">
                                <div class="card-header" id="heading2">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Sample pertanyaan kedua? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#pertanyaan2">
                                    <div class="card-body">
                                        Sample jawaban kedua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="pertanyaan3">
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Sample pertanyaan ketiga? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#pertanyaan3">
                                    <div class="card-body">
                                        Sample jawaban ketiga. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="pertanyaan4">
                            <div class="card">
                                <div class="card-header" id="heading4">
                                    <h2 class="clearfix">
                                        <a class="btn btn-link" data-mdb-toggle="collapse" data-mdb-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Sample pertanyaan keempat? 
                                            <i class="fas fa-angle-down ml-i"></i>
                                            <i class="fas fa-angle-up ml-i"></i></a>
                                    </h2>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#pertanyaan4">
                                    <div class="card-body">
                                        Sample pertanyaan keempat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ content -->
                    </div>
                </div>
            </div>
            <!-- /.col-md-8 -->
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- End FAQ -->

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
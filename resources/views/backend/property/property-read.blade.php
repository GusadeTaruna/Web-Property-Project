@extends('layouts.backend-layout')

@section('title', 'Property Data')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-11">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Property Info</h3>
              </div>
              <!-- /.card-header -->
                @foreach ($property as $data)
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  @if (!is_null($data->property_image))
                                  <?php foreach (json_decode($data->property_image)as $picture) { ?>
                                    <div class="carousel-item">
                                        <img class="openImg d-block w-100 mb-4" data-toggle="modal" data-target="#imageModalCenter" src="{{ asset('/property-image/'.$picture) }}" style="border-radius: 30px; height:500px; object-fit:cover">
                                    </div>
                                  <?php } ?>
                                  @endif
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Property Code</label>
                            <br>{{ $data->property_code }}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Property Name</label>
                            <br>{{ $data->property_name }}
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <br>{{ $data->property_location }}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <br>{{ $data->currency }} {{ number_format($data->price,2,'.',',') }}
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Property Status</label>
                            <br>{{ $data->property_status }}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="site-plan">Site Plan</label>
                            @if ($data->site_plan == 0)
                                <br>No
                            @else
                                <br>Yes
                            @endif
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="site-area">Site Area (m2)</label>
                            <br>{{ $data->site_area }}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="building_area">Building Area (m2)</label>
                            <br>{{ $data->building_area }}
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="power_kv">PLN / Power (kV)</label>
                            <br>{{ $data->power_kv }}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="generator">Generator (kV)</label>
                            <br>{{ $data->generator_kv }}
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="pdma">PDMA Water</label>
                            <br>{{ $data->pdma_water }}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="imb">IMB</label>
                            @if ($data->imb == 0)
                                <br>No
                            @else
                                <br>Yes
                            @endif
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="zoning-land">Zoning Land Use</label>
                            @if (!is_null($data->zoning))
                              @if (!is_numeric($data->zoning))
                                <br>{{ $data->zoning }}
                              @else
                                <br>{{ $data->zoning_list->nama_tipe }}
                              @endif
                            @endif
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="year-built">Year Built</label>
                              <br>{{ $data->year_built }}
                          </div>
                          </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <br>{{ $data->description }}
                        </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <label for="distance">Facilities</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-bed"></i>
                              </span>
                            </div>
                            <label class="form-control">Bedroom = {{ $data->bed_qty }}</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-bath"></i>
                              </span>
                            </div>
                            <label class="form-control">Bathroom = {{ $data->bath_qty }}</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-warehouse"></i>
                              </span>
                            </div>
                            <label class="form-control">Garage = {{ $data->garage_qty }}</label>
                          </div>
                        </div>
                      </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                        <div class="form-group">
                            <label for="distance">Distance From Nearest</label>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-school"></i>
                            </span>
                            </div>
                            <label class="form-control">School = {{ $data->school_distance }} km</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-hospital"></i>
                            </span>
                            </div>
                            <label class="form-control">Hospital = {{ $data->hospital_distance }} km</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-plane-departure"></i>
                            </span>
                            </div>
                            <label class="form-control">Airport = {{ $data->airport_distance }} km</label>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-store-alt"></i>
                            </span>
                            </div>
                            <label class="form-control">Supermarket = {{ $data->supermarket_distance }} km</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-umbrella-beach"></i>
                            </span>
                            </div>
                            <label class="form-control">Beach = {{ $data->beach_distance }} km</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-utensils"></i>
                            </span>
                            </div>
                            <label class="form-control">Fine dining = {{ $data->fine_dining_distance }} km</label>
                        </div>
                        </div>
                    </div>
          
                </div>
                <!-- /.card-body -->
                @endforeach
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
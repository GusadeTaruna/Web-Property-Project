@extends('layouts.backend-layout')

@section('title', 'Land Data')

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
                <h3 class="card-title">Land Info</h3>
              </div>
              <!-- /.card-header -->
              @foreach ($land as $data)
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
                        <label for="code">Land Code</label>
                        <br>{{ $data->property_code }}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Land Name</label>
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
                        <br>{{ $data->currency }} {{ number_format($data->price,0,'','.') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="status">Status</label>
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
                          <label for="city-draw">City Draw</label>
                          <br>{{ $data->city_draw }}
                      </div>
                  </div>
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-area">Site Dimensions</label>
                        <br>{{ $data->site_dimension }}
                      </div>
                    </div> --}}
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
                        <label for="building-area">PLN / Power (kV)</label>
                        <br>{{ $data->power_kv }}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="zoning-land">Zoning Types</label>
                        @if (!is_null($data->zoning))
                          @if (!is_numeric($data->zoning))
                            <br>{{ $data->zoning }}
                          @else
                            <br>{{ $data->zoning_list->nama_tipe }}
                          @endif
                        @endif
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

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="topography-plan">Topography plan</label>
                        @if ($data->topography_plan == 0)
                            <br>No
                        @else
                            <br>Yes
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="soil-test">Soil Test</label>
                        @if ($data->soil_test == 0)
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
                        <label for="slope-ratio">Slope Ratio</label>
                        <br>{{ $data->slope_ratio }}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-ratio">Building Ratio</label>
                        <br>{{ $data->building_ratio }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="rain-average">Rain Average (Year)</label>
                        <br>{{ $data->rain_avg_year }}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="humidity-average">Humidity Average (Year)</label>
                        <br>{{ $data->humidity_avg_year }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="access-road">Access Road</label>
                        @if ($data->access_road == 0)
                            <br>No
                        @else
                            <br>Yes
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="road-width">Access Road Width</label>
                        <br>{{ $data->access_road_width }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Surrounding Sites Description</label>
                        <br>{{ $data->surrounding_sites_desc }}
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
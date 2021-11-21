@extends('layouts.backend-layout')

@section('title', 'Add New Land')

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
            <h1>Add New Land</h1>
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
                <h3 class="card-title">Input the land info below</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="saveForm" action="/admin/land/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="code">Land Code</label>
                        <input type="email" name="code" value="{{ $landCode }}" class="form-control" readonly="readonly" id="code" placeholder="{{ $landCode }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Land Name</label>
                        <input type="text" name="land_name" class="form-control" id="name" placeholder="Input name here">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="land_location" class="form-control" id="location" placeholder="Input location here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="price">Price</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <select class="currency-selector" name="currency">
                                <option data-symbol="POI" data-placeholder="Price on Inquiry" value="POI">POI</option>
                                <option data-symbol="$" data-placeholder="0.00" value="USD" selected>USD</option>
                                <option data-symbol="Rp." data-placeholder="0.00" value="IDR">IDR</option>
                                <option data-symbol="€" data-placeholder="0.00" value="EUR">EUR</option>
                                <option data-symbol="£" data-placeholder="0.00" value="GBP">GBP</option>
                                <option data-symbol="¥" data-placeholder="0" value="JPY">JPY</option>
                                <option data-symbol="$" data-placeholder="0.00" value="CAD">CAD</option>
                                <option data-symbol="$" data-placeholder="0.00" value="AUD">AUD</option>
                                <option data-symbol="₩" data-placeholder="0.00" value="KRW">KRW</option>
                                <option data-symbol="HK$" data-placeholder="0.00" value="HKD">HKD</option>
                                <option data-symbol="¥" data-placeholder="0.00" value="CNY">CNY</option>
                              </select>
                            </div>
                          </div>
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <div class="input-group-addon currency-symbol">$</div>
                            </div>
                          </div>
                          <input type="number" name="price" step="0.01" class="form-control currency-amount @error('price') is-invalid @enderror" value="{{ old('price') }}" id="price" placeholder="0.00">
                          @error('price')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" id="status" placeholder="Input location here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="site-plan">Site Plan</label>
                        <select name="site_plan" class="custom-select" >
                          <option selected disabled>Choose One</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="site-area">Site Area (m2)</label>
                        <input name="site_area" type="text" class="form-control" id="site-area" placeholder="Input Site Area here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="imb">IMB</label>
                        <select name="imb" class="custom-select" >
                          <option selected disabled>Choose One</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>
                    </div>
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-area">Site Dimensions</label>
                        <input name="site_dimension" type="text" class="form-control" id="site-dimension" placeholder="Input Site Dimensions here">
                      </div>
                    </div> --}}
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pdma">PDMA Water</label>
                        <select name="pdma" class="custom-select" >
                          <option selected disabled>Choose One</option>
                          <option value="bor">Bor</option>
                          <option value="well">Well</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-area">PLN / Power (kV)</label>
                        <input name="pln" type="text" class="form-control" id="pln" placeholder="0">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zoning-land">Zoning Types</label>
                        <select name="zone_type" class="custom-select">
                          <option selected disabled>Choose One</option>
                          @foreach ($land_type as $type)
                            <option value="{{ $type->id }}">{{ $type->nama_tipe }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Input property description here..."></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="topography-plan">Topography plan</label>
                        <select name="topography" class="custom-select" >
                          <option selected disabled>Choose One</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="soil-test">Soil Test</label>
                        <select name="soil_test" class="custom-select">
                          <option selected disabled>Choose One</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="slope-ratio">Slope Ratio</label>
                        <input name="slope_ratio" type="text" class="form-control" id="slope-ratio" placeholder="Input Slope Ratio here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-ratio">Building Ratio</label>
                        <input name="building_ratio" type="text" class="form-control" id="building-ratio" placeholder="Input Building Ratio here">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="rain-average">Rain Average (Year)</label>
                        <input name="rain_average" type="text" class="form-control" id="rain-average" placeholder="Input Rain Average per year here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="humidity-average">Humidity Average (Year)</label>
                        <input name="humidity_average" type="text" class="form-control" id="humidity-average" placeholder="Input Humidity Average per year here">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="access-road">Access Road</label>
                        <select name="access_road" class="custom-select" >
                          <option selected disabled>Choose One</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="road-width">Access Road Width</label>
                        <input name="road_width" type="text" class="form-control" id="road-width" placeholder="Input Access Road Width here">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="city-draw">City Draw</label>
                        <input name="city_draw" type="text" class="form-control" id="city-draw" placeholder="Input City Draw here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="images">Land Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input @error('images') is-invalid @enderror" id="landImages" multiple >
                            <label class="custom-file-label" for="landImages">Choose file</label>
                            {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="video">Video Link</label>
                        <input type="text" name="video" class="form-control @error('video') is-invalid @enderror"  value="{{ old('video') }}" id="video" placeholder="Input video link here">
                        @error('video')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Surrounding Sites Description</label>
                        <textarea name="sites_description" class="form-control" id="sites-description" rows="3" placeholder="Input Surrounding Sites Description here..."></textarea>
                      </div>
                    </div>
                  </div>

                  {{-- <div class="row mt-4">
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
                        <input type="text" name="bed" class="form-control @error('bed') is-invalid @enderror"  value="{{ old('bed') }}" placeholder="Bedroom" aria-label="bed" aria-describedby="basic-addon1">
                        @error('bed')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-bath"></i>
                          </span>
                        </div>
                        <input type="text" name="bath" class="form-control @error('bath') is-invalid @enderror"  value="{{ old('bath') }}" placeholder="Bathroom" aria-label="bath" aria-describedby="basic-addon1">
                        @error('bath')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-warehouse"></i>
                          </span>
                        </div>
                        <input type="text" name="garage" class="form-control @error('garage') is-invalid @enderror"  value="{{ old('garage') }}" placeholder="Garage" aria-label="garage" aria-describedby="basic-addon1">
                        @error('garage')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div> --}}

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
                        <input type="text" name="school" class="form-control" placeholder="School (km)" aria-label="school" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-hospital"></i>
                          </span>
                        </div>
                        <input type="text" name="hospital" class="form-control" placeholder="Hospital (km)" aria-label="hospital" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-plane-departure"></i>
                          </span>
                        </div>
                        <input type="text" name="airport" class="form-control" placeholder="Airport (km)" aria-label="airport" aria-describedby="basic-addon1">
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
                        <input type="text" name="supermarket" class="form-control" placeholder="Supermarket (km)" aria-label="supermarket" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-umbrella-beach"></i>
                          </span>
                        </div>
                        <input type="text" name="beach" class="form-control" placeholder="Beach (km)" aria-label="beach" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-utensils"></i>
                          </span>
                        </div>
                        <input type="text" name="dining" class="form-control" placeholder="Fine Dining (km)" aria-label="dining" aria-describedby="basic-addon1">
                      </div>
                    </div>
                  </div>
          
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button class="btn btn-danger w-25">Cancel</button>
                  <button id="btnSubmit" type="submit" class="btn btn-success w-25">Draft</button>
                </div>
              </form>
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
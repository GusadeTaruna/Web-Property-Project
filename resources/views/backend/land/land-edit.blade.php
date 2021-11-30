@extends('layouts.backend-layout')

@section('title', 'Edit Land Data')

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
            <h1>Edit Land Data</h1>
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
              @foreach ($land as $data)
              <form action="{{ url('/admin/land/update/'.$data->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="code">Land Code</label>
                        <input type="email" name="code" value="{{ $data->property_code }}" class="form-control" readonly="readonly" id="code" placeholder="{{ $data->property_code }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Land Name</label>
                        <input type="text" name="land_name"  class="form-control @error('land_name') is-invalid @enderror" id="name" placeholder="{{$data->property_name}}" value="{{$data->property_name}}">
                        @error('land_name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="land_location" class="form-control @error('land_location') is-invalid @enderror" value="{{$data->property_location}}" id="location" placeholder="{{$data->property_location}}">
                            @error('land_location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price per 100m2</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <?php $currencys = array("POI", "USD", "IDR","EUR","GBP","JPY","CAD","AUD","KRW","HKD","CNY");   ?>
                                  <?php $options=$data->currency ?>
                                  @if($data->currency)
                                  <select class="currency-selector" name="currency">
                                    @foreach($currencys as $currency)
                                      <option data-symbol="{{$currency}}" value="{{$currency}}" {{($currency==$options)? 'selected':'' }}>{{$currency}}</option>
                                    @endforeach
                                  </select>
                                  @endif
                                </div>
                              </div>
                              <input type="number" name="price" step="0.01" class="form-control currency-amount @error('price') is-invalid @enderror" value="{{$data->price}}" id="price" placeholder="0.00">
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
                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{$data->property_status}}" id="status" placeholder="{{$data->property_status}}">
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="site-plan">Site Plan</label>
                        <select name="site_plan" class="custom-select" >
                            @if($data->site_plan==0)
                              <option disabled>Choose One</option>
                              <option value="0" selected>Yes</option>
                              <option value="1">No</option>
                            @else
                              <option disabled>Choose One</option>
                              <option value="0">Yes</option>
                              <option value="1" selected>No</option>
                            @endif
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site-area">Site Area (m2)</label>
                            <input name="site_area" type="text" class="form-control @error('site_area') is-invalid @enderror" value="{{$data->site_area}}" id="site_area" placeholder="{{$data->site_area}}">
                            @error('site_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-area">Site Dimensions</label>
                        <input name="site_dimension" type="text" class="form-control @error('site_dimension') is-invalid @enderror" id="site-dimension" placeholder="{{ $data->site_dimension }}" value="{{ $data->site_dimension }}">
                        @error('site_dimension')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div> --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="imb">IMB</label>
                        <select name="imb" class="custom-select" >
                            @if($data->imb==0)
                              <option disabled>Choose One</option>
                              <option value="0" selected>Yes</option>
                              <option value="1">No</option>
                            @else
                              <option disabled>Choose One</option>
                              <option value="0">Yes</option>
                              <option value="1" selected>No</option>
                            @endif
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pdma">PDMA Water</label>
                        <select name="pdma" class="custom-select" >
                            @if($data->pdma_water== "Bor")
                              <option disabled>Choose One</option>
                              <option selected value="bor">Bor</option>
                              <option value="well">Well</option>
                              <option value="0">No</option>
                            @elseif ($data->pdma_water== "Well")
                              <option disabled>Choose One</option>
                              <option value="bor">Bor</option>
                              <option selected value="well">Well</option>
                              <option value="0">No</option>
                            @elseif ($data->pdma_water== "0")
                              <option disabled>Choose One</option>
                              <option value="bor">Bor</option>
                              <option value="well">Well</option>
                              <option selected value="0">No</option>
                            @else
                              <option selected disabled>Choose One</option>
                              <option value="bor">Bor</option>
                              <option value="well">Well</option>
                              <option value="0">No</option>
                            @endif
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="building-area">PLN / Power (kV)</label>
                          <input name="pln" type="text" class="form-control @error('pln') is-invalid @enderror" id="pln" value="{{$data->power_kv}}" placeholder="{{$data->power_kv}}">
                          @error('pln')
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
                        <label for="zoning-land">Zoning Types</label>
                        <select name="zone_type" class="custom-select" >
                          <option disabled>Choose One</option>
                          @foreach ($land_type as $type)
                            <option value="{{ $type->id }}" {{$data->zoning == $type->id  ? 'selected' : ''}}>{{ $type->nama_tipe }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" placeholder="{{$data->description}}">{{$data->description}}</textarea>
                        @error('description')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="topography-plan">Topography plan</label>
                        <select name="topography" class="custom-select" >
                            @if($data->topography_plan==0)
                              <option disabled>Choose One</option>
                              <option value="0" selected>Yes</option>
                              <option value="1">No</option>
                            @else
                              <option disabled>Choose One</option>
                              <option value="0">Yes</option>
                              <option value="1" selected>No</option>
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="soil-test">Soil Test</label>
                        <select name="soil_test" class="custom-select" >
                            @if($data->soil_test==0)
                              <option disabled>Choose One</option>
                              <option value="0" selected>Yes</option>
                              <option value="1">No</option>
                            @else
                              <option disabled>Choose One</option>
                              <option value="0">Yes</option>
                              <option value="1" selected>No</option>
                            @endif
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slope-ratio">Slope Ratio</label>
                            <input name="slope_ratio" type="text" class="form-control @error('slope_ratio') is-invalid @enderror" id="slope-ratio" placeholder="{{ $data->slope_ratio }}" value="{{ $data->slope_ratio }}">
                            @error('slope_ratio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="building-ratio">Building Ratio</label>
                            <input name="building_ratio" type="text" class="form-control @error('building_ratio') is-invalid @enderror" id="building-ratio" placeholder="{{ $data->building_ratio }}" value="{{ $data->building_ratio }}">
                            @error('building_ratio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rain-average">Rain Average (Year)</label>
                            <input name="rain_average" type="text" class="form-control @error('rain_average') is-invalid @enderror" id="rain-average" placeholder="{{ $data->rain_avg_year }}" value="{{ $data->rain_avg_year }}">
                            @error('rain_average')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="humidity-average">Humidity Average (Year)</label>
                            <input name="humidity_average" type="text" class="form-control @error('humidity_average') is-invalid @enderror" id="humidity-average" placeholder="{{ $data->humidity_avg_year }}" value="{{ $data->humidity_avg_year }}">
                            @error('humidity_average')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="access-road">Access Road</label>
                        <select name="access_road" class="custom-select" >
                            @if($data->access_road==0)
                              <option disabled>Choose One</option>
                              <option value="0" selected>Yes</option>
                              <option value="1">No</option>
                            @else
                              <option disabled>Choose One</option>
                              <option value="0">Yes</option>
                              <option value="1" selected>No</option>
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="road-width">Access Road Width</label>
                            <input name="road_width" type="text" class="form-control @error('road_width') is-invalid @enderror" id="road-width" placeholder="{{ $data->access_road_width }}" value="{{ $data->access_road_width }}">
                            @error('road_width')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city-draw">City Draw</label>
                            <input name="city_draw" type="text" class="form-control @error('city_draw') is-invalid @enderror" id="city-draw" placeholder="{{ $data->city_draw }}" value="{{ $data->city_draw }}">
                            @error('city_draw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="images">Land Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input @error('images') is-invalid @enderror" id="landImages" multiple>
                            <label class="custom-file-label" for="landImages">This property have {{$count_image}} Images</label>
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
                        <input type="text" name="video" class="form-control @error('video') is-invalid @enderror"  value="{{$data->video_link}}" id="generator" placeholder="{{$data->video_link}}">
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
                            <label for="sites_description">Surrounding Sites Description</label>
                            <textarea class="form-control @error('sites_description') is-invalid @enderror" name="sites_description" id="sites_description" rows="3" placeholder="{{$data->surrounding_sites_desc}}">{{$data->surrounding_sites_desc}}</textarea>
                            @error('sites_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
                      <label for="bed">Bedroom</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-bed"></i>
                          </span>
                        </div>
                        <input type="text" name="bed" class="form-control @error('bed') is-invalid @enderror" placeholder="{{ $data->bed_qty }}" value="{{ $data->bed_qty }}" aria-label="bed" aria-describedby="basic-addon1">
                        @error('bed')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="bath">Bathroom</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-bath"></i>
                          </span>
                        </div>
                        <input type="text" name="bath" class="form-control @error('bath') is-invalid @enderror" value="{{ $data->bath_qty }}" placeholder="{{ $data->bath_qty }}" aria-label="bath" aria-describedby="basic-addon1">
                        @error('bath')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="garage">Garage</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-warehouse"></i>
                          </span>
                        </div>
                        <input type="text" name="garage" class="form-control @error('garage') is-invalid @enderror" value="{{ $data->garage_qty }}" placeholder="{{ $data->garage_qty }}" aria-label="garage" aria-describedby="basic-addon1">
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
                      <label for="school">School</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-school"></i>
                          </span>
                        </div>
                        <input type="text" name="school" class="form-control @error('school') is-invalid @enderror"  value="{{$data->school_distance}}" placeholder="{{$data->school_distance}}" aria-label="school" aria-describedby="basic-addon1">
                        @error('school')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="hospital">Hospital</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-hospital"></i>
                          </span>
                        </div>
                        <input type="text" name="hospital" class="form-control @error('hospital') is-invalid @enderror"  value="{{$data->hospital_distance}}" placeholder="{{$data->hospital_distance}}" aria-label="hospital" aria-describedby="basic-addon1">
                        @error('hospital')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="airport">Airport</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-plane-departure"></i>
                          </span>
                        </div>
                        <input type="text" name="airport" class="form-control @error('airport') is-invalid @enderror"  value="{{$data->airport_distance}}" placeholder="{{$data->airport_distance}}" aria-label="airport" aria-describedby="basic-addon1">
                        @error('airport')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <label for="supermarket">Supermarket</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-store-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="supermarket" class="form-control @error('supermarket') is-invalid @enderror"  value="{{$data->supermarket_distance}}" placeholder="{{$data->supermarket_distance}}" aria-label="supermarket" aria-describedby="basic-addon1">
                        @error('supermarket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="beach">Beach</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-umbrella-beach"></i>
                          </span>
                        </div>
                        <input type="text" name="beach" class="form-control @error('beach') is-invalid @enderror"  value="{{$data->beach_distance}}" placeholder="{{$data->beach_distance}}" aria-label="beach" aria-describedby="basic-addon1">
                        @error('beach')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="dining">Fine Dining</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-utensils"></i>
                          </span>
                        </div>
                        <input type="text" name="dining" class="form-control @error('dining') is-invalid @enderror"  value="{{$data->fine_dining_distance}}" placeholder="{{$data->fine_dining_distance}}" aria-label="dining" aria-describedby="basic-addon1">
                        @error('dining')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>
          
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button class="btn btn-danger w-25">Cancel</button>
                  <button type="submit" class="btn btn-success w-25">Submit</button>
                </div>
              </form>
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
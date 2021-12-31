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
                                                <input type="email" name="code" value="{{ $landCode }}"
                                                    class="form-control" readonly="readonly" id="code"
                                                    placeholder="{{ $landCode }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Land Name</label>
                                                <input type="text" name="land_name"
                                                    class="form-control @error('land_name') is-invalid @enderror"
                                                    value="{{ old('land_name') }}" id="name"
                                                    placeholder="Input name here">
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
                                                <input type="text" name="land_location"
                                                    class="form-control @error('land_location') is-invalid @enderror"
                                                    value="{{ old('land_location') }}" id="location"
                                                    placeholder="Input location here">
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
                                                            <select class="currency-selector" name="currency">
                                                                <option data-symbol="POI"
                                                                    data-placeholder="Price on Inquiry" value="POI">POI
                                                                </option>
                                                                <option data-symbol="$" data-placeholder="0.00" value="USD"
                                                                    selected>USD</option>
                                                                <option data-symbol="Rp." data-placeholder="0.00"
                                                                    value="IDR">IDR</option>
                                                                <option data-symbol="€" data-placeholder="0.00" value="EUR">
                                                                    EUR</option>
                                                                <option data-symbol="£" data-placeholder="0.00" value="GBP">
                                                                    GBP</option>
                                                                <option data-symbol="¥" data-placeholder="0" value="JPY">JPY
                                                                </option>
                                                                <option data-symbol="$" data-placeholder="0.00" value="CAD">
                                                                    CAD</option>
                                                                <option data-symbol="$" data-placeholder="0.00" value="AUD">
                                                                    AUD</option>
                                                                <option data-symbol="₩" data-placeholder="0.00" value="KRW">
                                                                    KRW</option>
                                                                <option data-symbol="HK$" data-placeholder="0.00"
                                                                    value="HKD">HKD</option>
                                                                <option data-symbol="¥" data-placeholder="0.00" value="CNY">
                                                                    CNY</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="input-group-addon currency-symbol">$</div>
                                                        </div>
                                                    </div>
                                                    <input type="number" name="price" step="0.01"
                                                        class="form-control currency-amount @error('price') is-invalid @enderror"
                                                        value="{{ old('price') }}" id="price" placeholder="0.00">
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
                                                <input type="text" name="status"
                                                    class="form-control @error('status') is-invalid @enderror" id="status"
                                                    value="{{ old('status') }}" placeholder="Input location here">
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
                                                <select name="site_plan" class="custom-select">
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
                                                <input name="site_area" type="number"
                                                    class="form-control @error('site_area') is-invalid @enderror"
                                                    value="{{ old('site_area') }}" id="site-area"
                                                    placeholder="Input Site Area here">
                                                @error('site_area')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="imb">IMB</label>
                                                <select name="imb" class="custom-select">
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
                                                <select name="pdma" class="custom-select">
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
                                                <input name="pln" type="text"
                                                    class="form-control @error('pln') is-invalid @enderror" id="pln"
                                                    value="{{ old('pln') }}"
                                                    placeholder="Leave blank if it has no value">
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
                                                <select name="zone_type"
                                                    class="custom-select @error('zone_type') is-invalid @enderror" id="zone_type">
                                                    <option selected disabled>Choose One</option>
                                                    @foreach ($land_type as $type)
                                                        <option value="{{ $type->id }}">{{ $type->nama_tipe }}
                                                        </option>
                                                    @endforeach
                                                    <option value="other">Add Option</option>
                                                </select>
                                                @error('zone_type')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="hidden-zoning-div">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="zone_type_string" type="text"
                                                    class="form-control @error('zone_type_string') is-invalid @enderror" id="pln"
                                                    value="{{ old('zone_type_string') }}"
                                                    placeholder="Input zoning type here">
                                                @error('zone_type_string')
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
                                                <label for="description">Description</label>
                                                <textarea name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    id="description" value="{{ old('description') }}" rows="3"
                                                    placeholder="Input property description here..."></textarea>
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
                                                <select name="topography" class="custom-select">
                                                    <option selected disabled>Choose One (ignore if no Topography plan)
                                                    </option>
                                                    <option value="0">Yes</option>
                                                    <option value="1">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="soil-test">Soil Test</label>
                                                <select name="soil_test" class="custom-select">
                                                    <option selected disabled>Choose One (ignore if no Soil Test)</option>
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
                                                <input name="slope_ratio" type="text"
                                                    class="form-control @error('slope_ratio') is-invalid @enderror"
                                                    value="{{ old('slope_ratio') }}" id="slope-ratio"
                                                    placeholder="Leave blank if it has no value">
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
                                                <input name="building_ratio" type="text"
                                                    class="form-control @error('building_ratio') is-invalid @enderror"
                                                    value="{{ old('building_ratio') }}" id="building-ratio"
                                                    placeholder="Leave blank if it has no value">
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
                                                <input name="rain_average" type="text"
                                                    class="form-control @error('rain_average') is-invalid @enderror"
                                                    value="{{ old('rain_average') }}" id="rain-average"
                                                    placeholder="Leave blank if it has no value">
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
                                                <input name="humidity_average" type="text"
                                                    class="form-control @error('humidity_average') is-invalid @enderror"
                                                    value="{{ old('humidity_average') }}" id="humidity-average"
                                                    placeholder="Leave blank if it has no value">
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
                                                <select name="access_road" class="custom-select">
                                                    <option selected disabled>Choose One (ignore if no Access Road)</option>
                                                    <option value="0">Yes</option>
                                                    <option value="1">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="road-width">Access Road Width</label>
                                                <input name="road_width" type="text"
                                                    class="form-control @error('road_width') is-invalid @enderror"
                                                    id="road-width" value="{{ old('road_width') }}"
                                                    placeholder="Leave blank if it has no value">
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
                                                <input name="city_draw" type="text"
                                                    class="form-control @error('city_draw') is-invalid @enderror"
                                                    id="city-draw" value="{{ old('city_draw') }}"
                                                    placeholder="Leave blank if it has no value">
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
                                                        <input type="file" name="images[]"
                                                            class="custom-file-input @error('images') is-invalid @enderror"
                                                            value="{{ old('images[]') }}" id="landImages" multiple>
                                                        <label class="custom-file-label" for="landImages">Choose
                                                            file</label>
                                                        @error('images')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video">Video Link</label>
                                                <input type="text" name="video"
                                                    class="form-control @error('video') is-invalid @enderror"
                                                    value="{{ old('video') }}" id="video"
                                                    placeholder="Leave blank if it has no value">
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
                                                <textarea name="sites_description"
                                                    class="form-control @error('sites_description') is-invalid @enderror"
                                                    value="{{ old('sites_description') }}" id="sites-description"
                                                    rows="3"
                                                    placeholder="Input Surrounding Sites Description here..."></textarea>
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
                                                <input type="text" name="school"
                                                    class="form-control @error('school') is-invalid @enderror"
                                                    value="{{ old('school') }}" placeholder="School (km)"
                                                    aria-label="school" aria-describedby="basic-addon1">
                                                @error('school')
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
                                                        <i class="fas fa-hospital"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="hospital"
                                                    class="form-control @error('hospital') is-invalid @enderror"
                                                    value="{{ old('hospital') }}" placeholder="Hospital (km)"
                                                    aria-label="hospital" aria-describedby="basic-addon1">
                                                @error('hospital')
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
                                                        <i class="fas fa-plane-departure"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="airport"
                                                    class="form-control @error('airport') is-invalid @enderror"
                                                    value="{{ old('airport') }}" placeholder="Airport (km)"
                                                    aria-label="airport" aria-describedby="basic-addon1">
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
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fas fa-store-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="supermarket"
                                                    class="form-control @error('supermarket') is-invalid @enderror"
                                                    value="{{ old('supermarket') }}" placeholder="Supermarket (km)"
                                                    aria-label="supermarket" aria-describedby="basic-addon1">
                                                @error('supermarket')
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
                                                        <i class="fas fa-umbrella-beach"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="beach"
                                                    class="form-control @error('beach') is-invalid @enderror"
                                                    value="{{ old('beach') }}" placeholder="Beach (km)"
                                                    aria-label="beach" aria-describedby="basic-addon1">
                                                @error('beach')
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
                                                        <i class="fas fa-utensils"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="dining"
                                                    class="form-control @error('dining') is-invalid @enderror"
                                                    value="{{ old('dining') }}" placeholder="Fine Dining (km)"
                                                    aria-label="dining" aria-describedby="basic-addon1">
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
                                    <button id="btnSubmit" type="submit" name="btn_submit" value="draft_btn"
                                        class="btn btn-primary w-25">Draft</button>
                                    <button id="btnSubmit2" type="submit" name="btn_submit" value="publish_btn"
                                        class="btn btn-success w-25">Publish</button>
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

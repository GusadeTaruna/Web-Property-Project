@extends('layouts.backend-layout')

@section('title', 'Add New Property')

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
                        <h1>Add New Property</h1>
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
                                <h3 class="card-title">Input the properties info below</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="saveForm" action="/admin/property/create" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Property Code</label>
                                                <input type="text" name="code" value={{ $propertyCode }}
                                                    class="form-control" readonly="readonly" id="code"
                                                    placeholder="{{ $propertyCode }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Property Name</label>
                                                <input type="text" name="property_name"
                                                    class="form-control @error('property_name') is-invalid @enderror"
                                                    value="{{ old('property_name') }}" id="property_name"
                                                    placeholder="Input name here">
                                                @error('property_name')
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
                                                <input type="text" name="location"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    value="{{ old('location') }}" id="location"
                                                    placeholder="Input Location here">
                                                @error('location')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Price</label>
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
                                                                <option data-symbol="S$" data-placeholder="0.00" value="SGD">
                                                                    SGD</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="input-group-addon currency-symbol">$</div>
                                                        </div>
                                                    </div>
                                                    <input type="number" name="price" step="any"
                                                        class="form-control currency-amount @error('price') is-invalid @enderror"
                                                        value="{{ old('price') }}" id="price" placeholder="0.00">
                                                    @error('price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                {{-- <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price') }}" id="price" placeholder="Input Price here">
                        @error('price')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <input type="text" name="status"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    value="{{ old('status') }}" id="status"
                                                    placeholder="Input Status here">
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
                                                <input type="number" name="site_area"
                                                    class="form-control @error('site_area') is-invalid @enderror"
                                                    value="{{ old('site_area') }}" id="site_area"
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
                                                <label for="building_area">Building Area (m2)</label>
                                                <input type="text" name="building_area"
                                                    class="form-control @error('building_area') is-invalid @enderror"
                                                    value="{{ old('building_area') }}" id="building_area"
                                                    placeholder="Input Building Area here">
                                                @error('building_area')
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
                                                <label for="power_kv">PLN / Power (kV)</label>
                                                <input type="text" name="power_kv"
                                                    class="form-control @error('power_kv') is-invalid @enderror"
                                                    value="{{ old('power_kv') }}" id="power_kv"
                                                    placeholder="Leave blank if it has no value">
                                                @error('power_kv')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="generator">Generator (kV)</label>
                                                <input type="text" name="generator"
                                                    class="form-control @error('generator') is-invalid @enderror"
                                                    value="{{ old('generator') }}" id="generator"
                                                    placeholder="Leave blank if it has no value">
                                                @error('generator')
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
                                                <label for="pdma">PDMA Water</label>
                                                <select name="pdma" class="custom-select">
                                                    <option selected disabled>Choose one (ignore if no PDMA)</option>
                                                    <option value="bor">Bor</option>
                                                    <option value="well">Well</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="imb">IMB</label>
                                                <select name="imb" class="custom-select">
                                                    <option selected disabled>Choose One (ignore if no IMB)</option>
                                                    <option value="0">Yes</option>
                                                    <option value="1">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zoning-property">Zoning Land Use</label>
                                                <select name="zoning_type" id="zoning_type"
                                                    class="custom-select @error('zoning_type') is-invalid @enderror">
                                                    <option selected disabled>Choose One</option>
                                                    @foreach ($property_type as $type)
                                                        <option value="{{ $type->id }}">{{ $type->nama_tipe }}
                                                        </option>
                                                    @endforeach
                                                    <option value="other">Add Option</option>
                                                </select>
                                                @error('zoning_type')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group" id="hidden-zoning-div">
                                                <input name="zoning_type_string" type="text"
                                                    class="form-control @error('zoning_type_string') is-invalid @enderror" id="pln"
                                                    value="{{ old('zoning_type_string') }}"
                                                    placeholder="Input zoning type">
                                                @error('zoning_type_string')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="generator">Year Built</label>
                                                <input type="date" name="year_built"
                                                    class="form-control @error('year_built') is-invalid @enderror"
                                                    value="{{ old('year_built') }}" id="year_built">
                                                @error('year_built')
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
                                                <label for="images_thumbnail">Thumbnail</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="images_thumbnail[]"
                                                            class="custom-file-input @error('images_thumbnail') is-invalid @enderror"
                                                            id="propertyThumbnail">
                                                        <label class="custom-file-label" for="propertyThumbnail">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="images">Property Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="images[]"
                                                            class="custom-file-input @error('images') is-invalid @enderror"
                                                            id="propertyImages" multiple>
                                                        <label class="custom-file-label" for="propertyImages">Choose
                                                            file</label>
                                                        {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
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
                                                <label for="description">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror"
                                                    value="{{ old('description') }}" name="description" id="description"
                                                    rows="3" placeholder="Input property description here..."></textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
                                                <input type="text" name="bed"
                                                    class="form-control @error('bed') is-invalid @enderror"
                                                    value="{{ old('bed') }}"
                                                    placeholder="Bedroom (Leave blank if it has no value)" aria-label="bed"
                                                    aria-describedby="basic-addon1">
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
                                                <input type="text" name="bath"
                                                    class="form-control @error('bath') is-invalid @enderror"
                                                    value="{{ old('bath') }}"
                                                    placeholder="Bathroom (Leave blank if it has no value)"
                                                    aria-label="bath" aria-describedby="basic-addon1">
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
                                                <input type="text" name="garage"
                                                    class="form-control @error('garage') is-invalid @enderror"
                                                    value="{{ old('garage') }}"
                                                    placeholder="Garage (Leave blank if it has no value)"
                                                    aria-label="garage" aria-describedby="basic-addon1">
                                                @error('garage')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
                                                <input type="number" name="school"
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
                                                <input type="number" name="hospital"
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
                                                <input type="number" name="airport"
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
                                                <input type="number" name="supermarket"
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
                                                <input type="number" name="beach"
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
                                                <input type="number" name="dining"
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
                                    <a class="btn btn-danger w-25" href="/admin/property">Cancel</a>
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

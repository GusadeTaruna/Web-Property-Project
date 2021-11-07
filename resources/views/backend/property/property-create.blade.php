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
              <form action="/admin/property/create" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="code">Property Code</label>
                        <input type="text" name="code" value={{ $propertyCode }} class="form-control" readonly="readonly" id="code" placeholder="{{ $propertyCode }}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Property Name</label>
                        <input type="text" name="property_name" class="form-control @error('property_name') is-invalid @enderror" required value="{{ old('property_name') }}" id="property_name" placeholder="Input name here">
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
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" required value="{{ old('location') }}" id="location" placeholder="Input Location here">
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
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" required value="{{ old('price') }}" id="price" placeholder="Input Price here">
                        @error('price')
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
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" required value="{{ old('status') }}" id="status" placeholder="Input Status here">
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
                        <select name="site_plan" class="custom-select" required>
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
                        <input type="text" name="site_area" class="form-control @error('site_area') is-invalid @enderror" required value="{{ old('site_area') }}" id="site_area" placeholder="Input Site Area here" >
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
                        <input type="text" name="building_area" class="form-control @error('building_area') is-invalid @enderror" required value="{{ old('building_area') }}" id="building_area" placeholder="Input Building Area here" >
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
                        <input type="text" name="power_kv" class="form-control @error('power_kv') is-invalid @enderror" required value="{{ old('power_kv') }}" id="power_kv" placeholder="0">
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
                        <input type="text" name="generator" class="form-control @error('generator') is-invalid @enderror" required value="{{ old('generator') }}" id="generator" placeholder="0">
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
                        <select name="pdma" class="custom-select" required>
                          <option selected disabled>Choose One</option>
                          <option value="bor">Bor</option>
                          <option value="well">Well</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="imb">IMB</label>
                        <select name="imb" class="custom-select" required>
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
                        <label for="zoning-land">Zoning Land Use</label>
                        <select name="zoning_type" class="custom-select" required>
                          <option selected disabled>Choose One</option>
                          @foreach ($property_type as $type)
                            <option value="{{ $type->id }}">{{ $type->nama_tipe }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="images">Property Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input @error('images') is-invalid @enderror" id="propertyImages" multiple required>
                            <label class="custom-file-label" for="propertyImages">Choose file</label>
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
                        <input type="text" name="video" class="form-control @error('video') is-invalid @enderror" required value="{{ old('video') }}" id="video" placeholder="Input video link here">
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
                        <textarea class="form-control @error('description') is-invalid @enderror" required value="{{ old('description') }}" name="description" id="description" rows="3" placeholder="Input property description here..."></textarea>
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
                        <input type="text" name="bed" class="form-control @error('bed') is-invalid @enderror" required value="{{ old('bed') }}" placeholder="Bedroom" aria-label="bed" aria-describedby="basic-addon1">
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
                        <input type="text" name="bath" class="form-control @error('bath') is-invalid @enderror" required value="{{ old('bath') }}" placeholder="Bathroom" aria-label="bath" aria-describedby="basic-addon1">
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
                        <input type="text" name="garage" class="form-control @error('garage') is-invalid @enderror" required value="{{ old('garage') }}" placeholder="Garage" aria-label="garage" aria-describedby="basic-addon1">
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
                        <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" required value="{{ old('school') }}" placeholder="School (km)" aria-label="school" aria-describedby="basic-addon1">
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
                        <input type="text" name="hospital" class="form-control @error('hospital') is-invalid @enderror" required value="{{ old('hospital') }}" placeholder="Hospital (km)" aria-label="hospital" aria-describedby="basic-addon1">
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
                        <input type="text" name="airport" class="form-control @error('airport') is-invalid @enderror" required value="{{ old('airport') }}" placeholder="Airport (km)" aria-label="airport" aria-describedby="basic-addon1">
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
                        <input type="text" name="supermarket" class="form-control @error('supermarket') is-invalid @enderror" required value="{{ old('supermarket') }}" placeholder="Supermarket (km)" aria-label="supermarket" aria-describedby="basic-addon1">
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
                        <input type="text" name="beach" class="form-control @error('beach') is-invalid @enderror" required value="{{ old('beach') }}" placeholder="Beach (km)" aria-label="beach" aria-describedby="basic-addon1">
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
                        <input type="text" name="dining" class="form-control @error('dining') is-invalid @enderror" required value="{{ old('dining') }}" placeholder="Fine Dining (km)" aria-label="dining" aria-describedby="basic-addon1">
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
                  <button type="submit" class="btn btn-success w-25">Submit</button>
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
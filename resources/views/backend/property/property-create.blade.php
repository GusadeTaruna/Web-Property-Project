@extends('layouts.backend-layout')

@section('title', 'Add New Property')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
              <form action="/admin/property/create" method="post">
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
                        <input type="text" name="property_name" class="form-control" id="property_name" placeholder="Input name here" required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" id="location" placeholder="Input location here" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Input location here" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" id="status" placeholder="Input location here" required>
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
                        <input type="text" name="site_area" class="form-control" id="site_area" placeholder="Input Site Area here" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="building_area">Building Area (m2)</label>
                        <input type="text" name="building_area" class="form-control" id="building_area" placeholder="Input Building Area here" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="power_kv">PLN / Power (kV)</label>
                        <input type="text" name="power_kv" class="form-control" id="power_kv" placeholder="0" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="generator">Generator (kV)</label>
                        <input type="text" name="generator" class="form-control" id="generator" placeholder="0" required>
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
                    <div class="col-md-12">
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
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Input property description here..." required></textarea>
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
                        <input type="text" name="school" class="form-control" placeholder="School (km)" aria-label="school" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-hospital"></i>
                          </span>
                        </div>
                        <input type="text" name="hospital" class="form-control" placeholder="Hospital (km)" aria-label="hospital" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-plane-departure"></i>
                          </span>
                        </div>
                        <input type="text" name="airport" class="form-control" placeholder="Airport (km)" aria-label="airport" aria-describedby="basic-addon1" required>
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
                        <input type="text" name="supermarket" class="form-control" placeholder="Supermarket (km)" aria-label="supermarket" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-umbrella-beach"></i>
                          </span>
                        </div>
                        <input type="text" name="beach" class="form-control" placeholder="Beach (km)" aria-label="beach" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-utensils"></i>
                          </span>
                        </div>
                        <input type="text" name="dining" class="form-control" placeholder="Fine Dining (km)" aria-label="dining" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                  </div>
          
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/property">Cancel</a>
                  <button type="submit" class="btn btn-primary w-25">Submit</button>
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
@extends('layouts.backend-layout')

@section('title', 'Add New Land')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
              <form action="/admin/land/create" method="post">
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
                        <input type="text" name="price" class="form-control" id="price" placeholder="Input location here">
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
                        <input name="site_area" type="text" class="form-control" id="site-area" placeholder="Input Site Area here">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="building-area">Site Dimensions</label>
                        <input name="site_dimension" type="text" class="form-control" id="site-dimension" placeholder="Input Site Dimensions here">
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
                        <label for="building-area">PLN / Power (kV)</label>
                        <input name="pln" type="text" class="form-control" id="pln" placeholder="0">
                      </div>
                    </div>
                    <div class="col-md-6">
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
@extends('layouts.backend-layout')

@section('title', 'Add new service')

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
            <h1>Add new service</h1>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach ($services as $data)
              <form action="{{ url('/admin/customize/services/update/'.$data->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="service_name">Service name</label>
                            <input type="text" name="service_name" value="{{ $data->service_name }}" class="form-control @error('service_name') is-invalid @enderror" id="service_name" placeholder="Input service name here">
                            @error('service_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="service_desc">Service description</label>
                            <input type="text" name="service_desc" class="form-control @error('service_desc') is-invalid @enderror" value="{{ $data->service_desc }}" id="service_desc" placeholder="Input service description here">
                            @error('service_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="service_image">Service Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="service_image[]" class="custom-file-input @error('service_image') is-invalid @enderror" id="service_image">
                              <label class="custom-file-label" for="service_image">Change Image</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php foreach (json_decode($data->service_img)as $picture) { ?>
                                <img class="d-block w-50 mx-auto" src="{{ asset('/service-asset/'.$picture) }}">
                            <?php } ?>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/customize/services">Cancel</a>
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
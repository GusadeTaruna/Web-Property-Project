@extends('layouts.backend-layout')

@section('title', 'Customize Contact Us Page')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
             @if(session()->has('errorMsg'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
        </div>
        
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
            <h1>Customize Contact Us Page</h1>
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
              @if (!$value)
              <form action="/admin/customize/contact/create" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="col-md-12">
                      <div class="form-group">
                          <img src="/img/customize/img-contact/2.jpg" class="d-block w-100 mb-4" alt="">
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="header_img">Header image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" id="header_img" name="header_img[]" class="custom-file-input @error('header_img') is-invalid @enderror" id="header_img" multiple>
                          <label class="custom-file-label" for="header_img">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-contact/1.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Leave it blank if you don't want to customize it">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contact">Contact Person</label>
                            <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" id="contact" placeholder="Leave it blank if you don't want to customize it">
                            @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="operation_hour">Operation Hours</label>
                            <input type="text" name="operation_hour" class="form-control @error('operation_hour') is-invalid @enderror" value="{{ old('operation_hour') }}" id="operation_hour" placeholder="Leave it blank if you don't want to customize it">
                            @error('operation_hour')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/property">Cancel</a>
                  <button type="submit" class="btn btn-success w-25">Submit</button>
                </div>
              </form>

              @else

              <form action="{{ url('/admin/customize/contact/update/'.$value['id'] ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                      <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-contact/2.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="header_img">Header image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="header_img[]" class="custom-file-input @error('header_img') is-invalid @enderror" id="header_img" multiple>
                            <label class="custom-file-label" for="header_img">{{$count_image}} Images</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-contact/1.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ $value['address'] }}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Leave it blank if you don't want to customize it">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contact">Contact Person</label>
                            <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ $value['contact'] }}" id="contact" placeholder="Leave it blank if you don't want to customize it">
                            @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="operation_hour">Operation Hours</label>
                            <input type="text" name="operation_hour" class="form-control @error('hour') is-invalid @enderror" value="{{ $value['operation_hour'] }}" id="operation_hour" placeholder="Leave it blank if you don't want to customize it">
                            @error('hour')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/property">Cancel</a>
                  <button type="submit" class="btn btn-success w-25">Submit</button>
                </div>
              </form>
              @endif
              
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
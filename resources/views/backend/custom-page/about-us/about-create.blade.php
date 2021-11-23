@extends('layouts.backend-layout')

@section('title', 'Customize About Us Page')

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
            <h1>Cuztomize About Us Page</h1>
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
              <form action="/admin/customize/about-us/create" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-about/1.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="team_header">Header image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="team_header[]" class="custom-file-input @error('team_header') is-invalid @enderror" id="team_header" multiple>
                            <label class="custom-file-label" for="team_header">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="team_title">Team section title</label>
                            <input type="text" name="team_title" value="{{ old('team_title') }}" class="form-control @error('team_title') is-invalid @enderror" id="team_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('team_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="team_desc">Team section description</label>
                            <input type="text" name="team_desc" class="form-control @error('team_desc') is-invalid @enderror" value="{{ old('team_desc') }}" id="team_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('team_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="team_img">Team section Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="team_img[]" class="custom-file-input @error('team_img') is-invalid @enderror" id="team_img" multiple>
                              <label class="custom-file-label" for="team_img">Choose file</label>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-about/2.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mission_title">Mission section title </label>
                            <input type="text" name="mission_title" value="{{ old('mission_title') }}" class="form-control @error('mission_title') is-invalid @enderror" id="mission_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('mission_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mission_desc">Mission section description</label>
                            <input type="text" name="mission_desc" class="form-control @error('mission_desc') is-invalid @enderror" value="{{ old('mission_desc') }}" id="mission_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('mission_desc')
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
              <form action="{{ url('/admin/customize/about-us/update/'.$value['id'] ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-about/1.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="team_header">Header image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="team_header[]" class="custom-file-input @error('team_header') is-invalid @enderror" id="team_header" multiple>
                            <label class="custom-file-label" for="team_header">{{$count_header}} Images</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="team_title">Team section title</label>
                            <input type="text" name="team_title" value="{{ $value['team_title'] }}" class="form-control @error('team_title') is-invalid @enderror" id="team_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('team_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="team_desc">Team section description</label>
                            <input type="text" name="team_desc" class="form-control @error('team_desc') is-invalid @enderror" value="{{ $value['team_desc'] }}" id="team_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('team_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="team_img">Team section Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="team_img[]" class="custom-file-input @error('team_img') is-invalid @enderror" id="team_img" multiple>
                              <label class="custom-file-label" for="team_img">{{$count_image}} Images</label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                  @if (!is_null($value['team_img']))
                                    <?php foreach (json_decode($value['team_img'])as $picture) { ?>
                                      <img class="d-block w-25 mb-3 mr-3" src="{{ asset('/about-asset/'.$picture) }}">
                                    <?php } ?>
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-about/2.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mission_title">Mission section title </label>
                            <input type="text" name="mission_title" value="{{ $value['mission_title'] }}" class="form-control @error('mission_title') is-invalid @enderror" id="mission_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('mission_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mission_desc">Mission section description</label>
                            <input type="text" name="mission_desc" class="form-control @error('mission_desc') is-invalid @enderror" value="{{ $value['mission_desc'] }}" id="mission_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('mission_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/customize/about-us">Cancel</a>
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
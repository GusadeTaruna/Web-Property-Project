@extends('layouts.backend-layout')

@section('title', 'Edit Member')

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
            <h1>Edit Member</h1>
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
              @foreach ($team as $data)
              <form action="{{ url('/admin/customize/about-us/team/update/'.$data->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="member_name">Name</label>
                            <input type="text" name="member_name" value="{{ $data->agent_name }}" class="form-control @error('member_name') is-invalid @enderror" id="member_name" placeholder="Input name here">
                            @error('member_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="member_dep">Department</label>
                            <input type="text" name="member_dep" class="form-control @error('member_dep') is-invalid @enderror" value="{{ $data->agent_title }}" id="member_dep" placeholder="Input department here">
                            @error('member_dep')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" value="{{ $data->agent_desc }}" id="desc" placeholder="Input description here">
                            @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="profile">Photo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="profile[]" class="custom-file-input @error('profile') is-invalid @enderror" id="profile">
                              <label class="custom-file-label" for="profile">Change Image</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php foreach (json_decode($data->agent_photo)as $picture) { ?>
                                <img class="d-block w-25 mx-auto" src="{{ asset('/about-asset/'.$picture) }}">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file_cv">CV File</label><br>
                            <?php foreach (json_decode($data->agent_cv)as $file_cv) { ?>
                                <a href="{{ asset('/about-asset/cv/'.$file_cv) }}" download="{{ $file_cv }}" class="btn btn-success">Download CV</a>
                              <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="file_cv">Change CV File</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="file_cv[]" class="custom-file-input @error('file_cv') is-invalid @enderror" id="file_cv">
                              <label class="custom-file-label" for="file_cv">Choose file</label>
                            </div>
                          </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/customize/about-us">Cancel</a>
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
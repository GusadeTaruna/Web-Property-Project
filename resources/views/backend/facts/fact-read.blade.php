@extends('layouts.backend-layout')

@section('title', 'Article Content')

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
                @foreach ($fact as $data)
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="article_title">Article Title</label>
                            <p>{{ $data->fact_title }}</p>
                          </div>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="article_category">Article Category</label>
                          <p>{{ $data->fact_category }}</p>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="article_content">Article content</label>
                          <div class="banner-image">
                            {!! $data->fact_content !!}
                          </div>
                           
                        </div>
                      </div>
                    </div>
            
                </div>
                @endforeach
               
                <!-- /.card-body -->
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
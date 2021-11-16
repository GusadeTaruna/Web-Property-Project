@extends('layouts.backend-layout')

@section('title', 'Dashboard')

@section('content')


       


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
    
        @if(session()->has('success'))
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @endif

        @if(session()->has('errorMsg'))
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @endif
        
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3>{{ $property_list }}</h3>
                          <p>Property List</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-building"></i>
                      </div>
                      <a href="/admin/property" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3>{{ $land_list }}</h3>
                          <p>Land List</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-sort-amount-down"></i>
                      </div>
                      <a href="/admin/land" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3>3</h3>
                          <p>Listing Request</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-clipboard-list"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3>{{ $inbox_list }}</h3>
                          <p>Inbox</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-user"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
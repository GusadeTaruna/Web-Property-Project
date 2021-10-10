@extends('layouts.backend-layout')

@section('title', 'Property List')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 d-flex justify-content-between">
            <h1>Property List</h1>
            <button class="btn btn-success my-auto">Add New Property</button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Property Code</th>
                    <th>Property Name</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>More Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>RV-2641</td>
                        <td>Commercial land</td>
                        <td>Batu Bolong</td>
                        <td>IDR 6,050,000,000</td>
                        <td>Leasehold</td>
                        <td><a href="#" class="btn btn-primary w-100">View</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
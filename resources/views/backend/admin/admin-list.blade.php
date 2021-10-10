@extends('layouts.backend-layout')

@section('title', 'Admin List')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 d-flex justify-content-between">
            <h1>List Admin</h1>
            <button class="btn btn-success my-auto">Add New Admin</button>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Sample name 1</td>
                        <td>Sample email 1</td>
                        <td>Sample role 1</td>
                        <td>Sample DOB 1</td>
                        <td>Sample gender 1</td>
                        <td>Sample number 1</td>
                        
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
@extends('layouts.backend-layout')

@section('title', 'Property Categories')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 d-flex justify-content-between">
            <h1>Property Categories</h1>
            <button class="btn btn-success my-auto">Add New Category</button>
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
                    <th class="w-25">Category</th>
                    <th>Description</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Category 1</td>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur eligendi vitae laudantium nisi hic. Nostrum nisi voluptatum pariatur sapiente debitis velit architecto temporibus! Aspernatur accusamus quisquam cum delectus et laborum!</td>
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
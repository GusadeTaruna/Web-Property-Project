@extends('layouts.backend-layout')

@section('title', 'Customize Services')

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
          <div class="col-sm-12 d-flex justify-content-between">
            <h1>List Services</h1>
            <a href="/admin/customize/services/create" class="btn btn-success my-auto">Add New Services</a>
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
                    <th>No.</th>
                    <th>Service Name</th>
                    <th>Service Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $counter = 1;
                    @endphp
                    @foreach ($services as $service)
                      <tr>
                        @php
                          echo "<td>" . $counter++ . "</td>";
                        @endphp
                        <td>{{ $service->service_name }}</td>
                        <td>{{ $service->service_desc }}</td>
                        <td>
                          <?php foreach (json_decode($service->service_img)as $picture) { ?>
                              <img class="openImg d-block w-25" src="{{ asset('/service-asset/'.$picture) }}">
                          <?php } ?>
                        </td>
                        <form method="POST" action="{{ route('delete-service', $service->id) }}">
                          @csrf
                          @method('DELETE')
                          <td>
                            <a href="{{ route('edit-service',$service->id) }}" class="btn btn-success mb-2">Edit</a>
                            <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this data?');">Delete</button>
                          </td>
                        </form>
                      </tr>
                    @endforeach
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
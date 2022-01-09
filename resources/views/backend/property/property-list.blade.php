@extends('layouts.backend-layout')

@section('title', 'Property List')

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
             @if(session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-sm-12 d-flex justify-content-between">
            <h1>Property List</h1>
            <a href="/admin/property/create" class="btn btn-success my-auto">Add New Property</a>
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
                    <th>Listing status</th>
                    <th>Property Code</th>
                    <th>Property Name</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Property Status</th>
                    <th style="text-align: center;">More Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($property as $data)
                      <tr>
                          <td>{{ $data->data_status }}</td>
                          <td>{{ $data->property_code }}</td>
                          <td>{{ ucwords(strtolower($data->property_name)) }}</td>
                          <td>{{ ucwords(strtolower($data->property_location)) }}</td>
                          @if ($data->currency=="POI")
                            <td>Price on Inquiry</td>
                          @else
                            <td>{{ $data->currency }} {{ number_format($data->price,2,'.',',') }}</td>
                          @endif
                          <td>{{ $data->property_status }}</td>
                          <form method="POST" action="{{ route('delete-property', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <td style="text-align: center;">
                              <a href="{{ route('read-property',$data->property_code) }}" class="btn btn-success mb-2">View</a>
                              <a href="{{ route('edit-property',$data->property_code) }}" class="btn btn-primary mb-2">Edit</a>
                              <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this property?');">Delete</button>
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
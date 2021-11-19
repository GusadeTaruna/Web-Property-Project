@extends('layouts.backend-layout')

@section('title', 'Customize About')

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
            <h1>List team member</h1>
            <div>
                <a href="/admin/customize/about-us/create" class="btn btn-success mb-2">Customize About Us Page</a>
                <a href="/admin/customize/about-us/create/team" class="btn btn-success mb-2">Add New Team Member</a>
            </div>
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
                    <th>Member Name</th>
                    <th>Member Department</th>
                    <th>Description</th>
                    <th>Curriculum Vitae</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $counter = 1;
                    @endphp
                    @foreach ($team as $data)
                      <tr>
                        @php
                          echo "<td>" . $counter++ . "</td>";
                        @endphp
                        <td>{{ $data->agent_name }}</td>
                        <td>{{ $data->agent_title }}</td>
                        <td>{{ $data->agent_desc }}</td>
                        <td>
                          <?php foreach (json_decode($data->agent_cv)as $file_cv) { ?>
                            <a href="{{ asset('/about-asset/cv/'.$file_cv) }}" download="{{ $file_cv }}" class="btn btn-success">Download CV</a>
                          <?php } ?>
                        </td>
                        <td class="d-flex justify-content-center">
                          <?php foreach (json_decode($data->agent_photo)as $picture) { ?>
                            <img class="openImg d-block w-50 mw-100" src="{{ asset('/about-asset/'.$picture) }}">
                          <?php } ?>
                        </td>
                        <form method="POST" action="{{ route('delete-team', $data->id) }}">
                          @csrf
                          @method('DELETE')
                          <td>
                            <a href="{{ route('edit-team',$data->id) }}" class="btn btn-success mb-2">Edit</a>
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
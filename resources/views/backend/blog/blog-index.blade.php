@extends('layouts.backend-layout')

@section('title', 'Blog List')

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
            <h1>Blog List</h1>
            <a href="/admin/blog/create" class="btn btn-success my-auto">Add New Article</a>
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($blog as $data)
                    <tr>
                      <td>{{ $data->blog_title }}</td>
                      <td>{{ $data->blog_category }}</td>
                      <form method="POST" action="{{ route('delete-blog', $data->id) }}">
                        @csrf
                        @method('DELETE')
                        <td style="text-align: center;">
                          <a href="{{ route('show-blog',$data->id) }}" class="btn btn-success mb-2">View content</a>
                          <a href="{{ route('edit-blog',$data->id) }}" class="btn btn-primary mb-2">Edit</a>
                          <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this article?');">Delete</button>
                        </td>
                      </form>
                      {{-- <form method="POST" action="{{ route('delete-land', $data->id) }}">
                        @csrf
                        @method('DELETE')
                        <td style="text-align: center;">
                          <a href="{{ route('read-land',$data->property_code) }}" class="btn btn-success mb-2">View</a>
                          <a href="{{ route('edit-land',$data->property_code) }}" class="btn btn-primary mb-2">Edit</a>
                          <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this property?');">Delete</button>
                        </td>
                      </form> --}}
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
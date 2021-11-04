@extends('layouts.backend-layout')

@section('title', 'Inquiry Inbox')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 d-flex justify-content-between">
            <h1>Messages List</h1>
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
                    <th>From</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>List Inquiry</th>
                    <th>Message</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($inbox as $data)
                      <tr>
                        <td>{{ $data->sender_name }}</td>
                        <td>{{ $data->sender_email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->country }}</td>
                        <td>{{ $data->inquiry_list }}</td>
                        <td>{{ $data->message }}</td>
                        <form method="POST" action="{{ route('delete-inquiry', $data->id) }}">
                          @csrf
                          @method('DELETE')
                        <td style="text-align: center;">
                          @if ($data->status_msg_seen==0)
                            <a href="{{ route('read-inquiry',$data->id) }}" class="btn btn-success w-100 mb-2">View</a>
                          @elseif($data->status_msg_seen==1)
                            <a href="{{ route('read-inquiry',$data->id) }}" class="btn btn-secondary w-100 mb-2">Seen</a>
                          @endif
                          <button type="submit" class="btn btn-danger w-100 mb-2" onclick="return confirm('Are you sure want to delete this message?');">Delete</button>
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
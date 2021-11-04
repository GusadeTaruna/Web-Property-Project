@extends('layouts.backend-layout')

@section('title', 'Add New Property')

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
                <h3 class="card-title">Property Info</h3>
              </div>
              <!-- /.card-header -->
                @foreach ($message as $messages)
                <div class="card-body">
                    <h2 style="font-weight: bold">New Email arrived!</h2>
                    <div>
                        <h5 class="mb-5">Email from : {{ $messages->sender_name }} ({{ $messages->sender_email }})</h5>
                    </div>
                    <span style="font-weight: bold">Message :</span> <br>
                    <p>{{ $messages->message }}</p>
                    @if ($messages->status_msg_respon==0)
                        <a class="btn btn-success" href="{{ route('respond-inbox',$messages->id) }}">Click this if you already responded</a>
                    @elseif($messages->status_msg_respon==1)
                        <a class="btn btn-secondary" href="#">This message has been responded</a>
                    @endif
                </div>
                <!-- /.card-body -->
                @endforeach
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
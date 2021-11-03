@extends('layouts.login-layout')

@section('content')
<div class="login-box">
  <div class="login-logo mb-3">
    <a href="/admin"><img src="/img/logo/logo.png" style="width: 250px; height: auto;"></img></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Admin</p>

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <form action="/admin/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control @error('username') is-invalid 
          @enderror" placeholder="Username" autofocus required value="{{ old('username') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary btn-block" style="background: #a5876a; border: none;">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <p class="mb-1 mt-4 text-center">
      </p> --}}
      <p class="mb-0 mt-2 text-center">
        <a href="forgot-password.html" style="color: #a5876a;">Lupa Password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
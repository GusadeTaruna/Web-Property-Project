@extends('layouts.login-layout')

@section('content')
<div class="global-container">
  <div class="card login-form">
  <div class="card-body">
    <h3 class="card-title text-center">Log in to Admin Panel</h3>
    <div class="card-text">
      <!--
      <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->

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

      <form action="/login" method="post">
        @csrf
        <!-- to error: add class "has-danger" -->
        <div class="form-group">
          <label for="username">Username</label>
          <input type="username" name="username" class="form-control form-control-sm mb-4 @error('username') is-invalid 
          @enderror" id="username" aria-describedby="username" autofocus required value="{{ old('username') }}">
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <a href="#" class="forgot-text">Lupa password?</a>
          <input type="password" name="password" class="form-control form-control-sm" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        
        <div class="sign-up">
          Tidak Punya Akun? <a href="/register">Register</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
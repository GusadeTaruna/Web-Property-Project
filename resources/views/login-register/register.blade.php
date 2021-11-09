@extends('layouts.register-layout')



@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row justify-content-center h-100">
      <div class="col-12 col-lg-9 col-xl-12 text-center mb-4">
         <a href="/admin"><img src="/img/logo/logo.png" style="width: 230px; height: auto;"></img></a>
      </div>
      <div class="col-12 col-lg-9 col-xl-5">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center" style="font-weight: bold; color:#a5876a;">Employee Registration Form</h3>
            <form action="/admin/register" method="post">
              @csrf
             
              <!-- Input Nama dan Username -->
              <div class="row">
                <div class="col-md-12">
                 <label class="form-label" style="color:#a5876a;font-weight:bold;">Name:</label>
                 <div class="form-outline w-100 mb-3">
                    <input type="text" id="nama" name="nama" placeholder="Input your name here" class="form-control form-control-lg @error('nama') is-invalid @enderror" required value="{{ old('nama') }}" />
                    @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                 
                </div>
              </div>
              <!-- Input Nama dan Username -->

              <!-- Input No Telepon dan Email -->
              <div class="row">
                <div class="col-md-12">
                 <label class="form-label"style="color:#a5876a;font-weight:bold;">Email Address:</label>
                  <div class="form-outline w-100 mb-3">
                    <input type="email" id="email" name="email" placeholder="Input your email here" class="form-control form-control-lg @error('email') is-invalid @enderror" required value="{{ old('email') }}"/>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="form-label" style="color:#a5876a;font-weight:bold;">Phone number:</label>
                  <div class="form-outline mb-3">
                    <input type="tel" id="telephone" name="telephone" placeholder="Input your phone number here" class="form-control form-control-lg @error('telephone') is-invalid @enderror" required value="{{ old('telephone') }}"/>
                    @error('telephone')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- Input No Telepon dan Email -->

              <!-- Input Password dan Konfirmasi -->
              <div class="row">
                <div class="col-md-12">
                 <label class="form-label" style="color:#a5876a;font-weight:bold;">Password:</label>
                 <div class="form-outline w-100 mb-3">
                    <input type="password" id="password" name="password" placeholder="Input your password here" class="form-control form-control-lg @error('password') is-invalid @enderror" required/>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="form-label" style="color:#a5876a;font-weight:bold;">Confirm Password:</label>
                   <div class="form-outline mb-3">
                    <input type="password" id="konfirmasi" placeholder="Input your password once again here" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" required/>
                    @error('password_confirmation')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- Input Password dan Konfirmasi -->

              <div class="mt-4">
                <input class="btn btn-success btn-lg" type="submit" value="Submit" />
              </div>

              <div class="mt-3 text-center">
                <label class="form-label select-label">Sudah punya akun? <a href="/admin/login" style="color:#a5876a;font-weight:bold;">Login</a></label>
              </div>

            </form>
          </div>
        </div>
      </div>

  </div>
</section>
@endsection
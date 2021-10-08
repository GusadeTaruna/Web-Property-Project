@extends('layouts.register-layout')



@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <h3 class=" text-center">LOGO</h3>
      </div>
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Form Registrasi Admin</h3>
            <form action="/admin/register" method="post">
              @csrf
             
              <!-- Input Nama dan Username -->
              <div class="row">
                <div class="col-md-6">
                 <label class="form-label">Nama:</label>
                 <div class="form-outline w-100 mb-3">
                    <input type="text" id="nama" name="nama" class="form-control form-control-lg @error('nama') is-invalid @enderror" required value="{{ old('nama') }}" />
                    @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                 
                </div>
                <div class="col-md-6">
                  <label class="form-label">Username:</label>
                  <div class="form-outline mb-3">
                    <input type="text" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" required value="{{ old('username') }}" />
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- Input Nama dan Username -->

              <!-- Input Tanggal dan Jenis Kelamin -->
              <div class="row">
                <div class="col-md-6">
                 <label class="form-label">Tanggal Lahir:</label>
                 <div class="form-outline w-100 mb-3">
                    <input type="date" name="tanggal" class="form-control form-control-lg @error('tanggal') is-invalid @enderror" required value="{{ old('tanggal') }}"/>
                    @error('tanggal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Jenis Kelamin:</label>
                  <div class="mb-3">
                    <select name="kelamin" class="form-control form-control-lg @error('kelamin') is-invalid @enderror" required value="{{ old('kelamin') }}">
                      <option value="" disabled selected>Pilih disini</option>
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                    @error('kelamin')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- Input Tanggal dan Jenis Kelamin -->

              <!-- Input No Telepon dan Email -->
              <div class="row">
                <div class="col-md-6">
                 <label class="form-label">Alamat Email:</label>
                  <div class="form-outline w-100 mb-3">
                    <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" required value="{{ old('email') }}"/>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Nomor Telepon:</label>
                  <div class="form-outline mb-3">
                    <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg @error('telephone') is-invalid @enderror" required value="{{ old('telephone') }}"/>
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
                <div class="col-md-6">
                 <label class="form-label">Kata Sandi:</label>
                 <div class="form-outline w-100 mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required/>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Konfirmasi Kata Sandi:</label>
                   <div class="form-outline mb-3">
                    <input type="password" id="konfirmasi" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" required/>
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
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

              <div class="mt-3 text-center">
                <label class="form-label select-label">Sudah punya akun? <a href="/admin/login">Login</a></label>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
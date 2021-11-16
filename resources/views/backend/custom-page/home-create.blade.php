@extends('layouts.backend-layout')

@section('title', 'Customize Home Page')

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
            <h1>Cuztomize Home Page</h1>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if (!$value)
              <form action="/admin/customize/homepage/create" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/1.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="header_title">Header Title 1</label>
                            <input type="text" name="header_title" value="{{ old('header_title') }}" class="form-control @error('header_title') is-invalid @enderror" id="header_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('header_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="header_sub_title">Header Title 2</label>
                            <input type="text" name="header_sub_title" class="form-control @error('header_sub_title') is-invalid @enderror" value="{{ old('header_sub_title') }}" id="header_sub_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('header_sub_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="header_image">Header Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="header_image[]" class="custom-file-input @error('header_image') is-invalid @enderror" id="header_image" multiple>
                              <label class="custom-file-label" for="propertyImages">Choose file</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/2.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="left_title">Left Text Title </label>
                            <input type="text" name="left_title" value="{{ old('left_title') }}" class="form-control @error('left_title') is-invalid @enderror" id="left_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('left_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="left_desc">Left Text Description</label>
                            <input type="text" name="left_desc" class="form-control @error('left_desc') is-invalid @enderror" value="{{ old('left_desc') }}" id="left_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('left_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="right_asset">Right Image/Video</label>
                            <select name="right_asset" id="right_select" class="custom-select">
                                <option selected disabled>Choose One (Ignore this if you don't want to customize it)</option>
                                <option value="images_input_right">Images</option>
                                <option value="video_input_right">Video</option>
                            </select>
                        </div>
                    </div>

                    {{-- Video --}}
                    <div class="col-md-12" id="video_input_right" style="display:none">
                        <div class="form-group">
                          <label for="video_right">Video Link</label>
                          <input type="text" name="video_right" class="form-control @error('video_right') is-invalid @enderror" value="{{ old('video_right') }}" id="video_right" placeholder="Input video link here">
                          @error('video_right')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>
                    {{-- Image --}}
                    <div class="col-md-12" id="images_input_right" style="display:none">
                        <div class="form-group">
                          <label for="image_right">Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="image_right[]" class="custom-file-input @error('image_right') is-invalid @enderror" id="image_right" multiple>
                              <label class="custom-file-label" for="propertyImages">Choose file</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/3.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="left_asset">Left Image/Video</label>
                            <select name="left_asset" id="left_select" class="custom-select">
                                <option selected disabled>Choose One (Ignore this if you don't want to customize it)</option>
                                <option value="images_input_left">Images</option>
                                <option value="video_input_left">Video</option>
                            </select>
                        </div>
                    </div>
                    {{-- Video --}}
                    <div class="col-md-12" id="video_input_left" style="display:none">
                        <div class="form-group">
                          <label for="video_left">Video Link</label>
                          <input type="text" name="video_left" class="form-control @error('video_left') is-invalid @enderror" value="{{ old('video_left') }}" id="video_right" placeholder="Input video link here">
                          @error('video_left')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>
                    {{-- Image --}}
                    <div class="col-md-12" id="images_input_left" style="display:none">
                        <div class="form-group">
                          <label for="image_left">Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="image_left[]" class="custom-file-input @error('image_left') is-invalid @enderror" id="image_left" multiple>
                              <label class="custom-file-label" for="propertyImages">Choose file</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="right_title">Right Text Title</label>
                            <input type="text" name="right_title" value="{{ old('right_title') }}" class="form-control @error('right_title') is-invalid @enderror" id="right_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('right_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="right_desc">Right Text Description</label>
                            <input type="text" name="right_desc" class="form-control @error('right_desc') is-invalid @enderror" value="{{ old('right_desc') }}" id="right_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('right_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/4.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="center_text">Center Text</label>
                            <input type="text" name="center_text" value="{{ old('center_text') }}" class="form-control @error('center_text') is-invalid @enderror" id="center_text" placeholder="Leave it blank if you don't want to customize it">
                            @error('center_text')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/property">Cancel</a>
                  <button type="submit" class="btn btn-success w-25">Submit</button>
                </div>
              </form>
              @else
              <form action="{{ url('/admin/customize/homepage/update/'.$value['id'] ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/1.jpg" class="d-block w-100 mb-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="header_title">Header Title 1</label>
                            <input type="text" name="header_title" value="{{ $value['header_title'] }}" class="form-control @error('header_title') is-invalid @enderror" id="header_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('header_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="header_sub_title">Header Title 2</label>
                            <input type="text" name="header_sub_title" class="form-control @error('header_sub_title') is-invalid @enderror" value="{{ $value['header_sub_title'] }}" id="header_sub_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('header_sub_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="header_image">Header Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="header_image[]" class="custom-file-input @error('header_image') is-invalid @enderror" id="header_image" multiple>
                              <label class="custom-file-label" for="propertyImages">{{$count_image_header}} Images</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/2.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="left_title">Left Text Title </label>
                            <input type="text" name="left_title" value="{{ $value['left_section_title'] }}" class="form-control @error('left_title') is-invalid @enderror" id="left_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('left_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="left_desc">Left Text Description</label>
                            <input type="text" name="left_desc" class="form-control @error('left_desc') is-invalid @enderror" value="{{ $value['left_section_sub_title'] }}" id="left_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('left_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="right_asset">Right Image/Video</label>
                            @if (is_array(json_decode($value['right_section_image_or_vid'])))
                              <div class="col-md-12">
                                <div class="row">
                                <?php foreach (json_decode($value['right_section_image_or_vid'])as $picture) { ?>
                                  <img class="d-block w-25 mb-3 mr-3" src="{{ asset('/home-asset/'.$picture) }}">
                                <?php } ?>
                                </div>
                              </div>
                            @else
                              <div class="d-block w-100 text-center mb-3 mr-3">
                                @php
                                $string = $value['right_section_image_or_vid'];
                                $link = preg_replace(
                                      "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                      "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                                      $string
                                      
                                    );
                                    echo $link
                                @endphp
                              </div>
                            @endif
                            <select name="right_asset" id="right_select" class="custom-select">
                                <option selected disabled>Choose One (Ignore this if you don't want to customize it)</option>
                                <option value="images_input_right">Images</option>
                                <option value="video_input_right">Video</option>
                            </select>
                        </div>
                    </div>

                    {{-- Video --}}
                    <div class="col-md-12" id="video_input_right" style="display:none">
                        <div class="form-group">
                          <label for="video_right">Video Link</label>
                          <input type="text" name="video_right" class="form-control @error('video_right') is-invalid @enderror" 
                          value="@if (is_array($value['right_section_image_or_vid']))
                            {{ $value['right_section_image_or_vid'] }}
                          @endif" 
                          id="video_right" placeholder="Input video link here">
                          @error('video_right')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>
                    {{-- Image --}}
                    <div class="col-md-12" id="images_input_right" style="display:none">
                        <div class="form-group">
                          <label for="image_right">Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="image_right[]" class="custom-file-input @error('image_right') is-invalid @enderror" id="image_right" multiple>
                              <label class="custom-file-label" for="image_right">This property have {{$count_image_right}} Images</label>
                              {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/3.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="right_title">Right Text Title</label>
                            <input type="text" name="right_title" value="{{ $value['right_section_title'] }}" class="form-control @error('right_title') is-invalid @enderror" id="right_title" placeholder="Leave it blank if you don't want to customize it">
                            @error('right_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="right_desc">Right Text Description</label>
                            <input type="text" name="right_desc" class="form-control @error('right_desc') is-invalid @enderror" value="{{ $value['right_section_sub_title'] }}" id="right_desc" placeholder="Leave it blank if you don't want to customize it">
                            @error('right_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="left_asset">Left Image/Video</label>
                          @if (is_array(json_decode($value['left_section_image_or_vid'])))
                              <div class="col-md-12">
                                <div class="row">
                                <?php foreach (json_decode($value['left_section_image_or_vid'])as $picture) { ?>
                                  <img class="d-block w-25 mb-3 mr-3" src="{{ asset('/home-asset/'.$picture) }}">
                                <?php } ?>
                                </div>
                              </div>
                            @else
                              <div class="d-block w-100 text-center mb-3 mr-3">
                                @php
                                $string = $value['left_section_image_or_vid'];
                                $link = preg_replace(
                                      "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                      "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                                      $string
                                      
                                    );
                                    echo $link
                                @endphp
                              </div>
                            @endif
                          <select name="left_asset" id="left_select" class="custom-select">
                              <option selected disabled>Choose One (Ignore this if you don't want to customize it)</option>
                              <option value="images_input_left">Images</option>
                              <option value="video_input_left">Video</option>
                          </select>
                      </div>
                  </div>
                  {{-- Video --}}
                  <div class="col-md-12" id="video_input_left" style="display:none">
                      <div class="form-group">
                        <label for="video_left">Video Link</label>
                        <input type="text" name="video_left" class="form-control @error('video_left') is-invalid @enderror" 
                        value="@if (is_array($value['left_section_image_or_vid']))
                          {{ $value['left_section_image_or_vid'] }}
                        @endif" 
                        id="video_left" placeholder="Input video link here">
                        @error('video_left')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                  </div>
                  {{-- Image --}}
                  <div class="col-md-12" id="images_input_left" style="display:none">
                      <div class="form-group">
                        <label for="image_left">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image_left[]" class="custom-file-input @error('image_left') is-invalid @enderror" id="image_left" multiple>
                            <label class="custom-file-label" for="image_left">This property have {{$count_image_left}} Images</label>
                            {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
                          </div>
                        </div>
                      </div>
                  </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="/img/customize/img-home/4.jpg" class="d-block w-100 mb-4 mt-4" alt="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="center_text">Center Text</label>
                            <input type="text" name="center_text" value="{{ $value['center_section_text'] }}" class="form-control @error('center_text') is-invalid @enderror" id="center_text" placeholder="Leave it blank if you don't want to customize it">
                            @error('center_text')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a class="btn btn-danger w-25" href="/admin/property">Cancel</a>
                  <button type="submit" class="btn btn-success w-25">Submit</button>
                </div>
              </form>
              @endif
              
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
@extends('layouts.backend-layout')

@section('title', 'Edit Blog Article')

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
            <h1>Edit Blog Article</h1>
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
              @foreach ($blog as $data)
                <form action="{{ url('/admin/blog/update/'.$data->id ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning show">
                            <p class="mb-0 text-bold">1. Make sure that image size used in Article content is smaller than 1Mb</p>
                            {{-- <p class="mb-0 text-bold">2. Draft have not implemented yet</p> --}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="article_title">Article Title</label>
                                <input type="text" name="article_title" class="form-control @error('article_title') is-invalid @enderror" id="article_title" placeholder="Input article title here" value="{{$data->blog_title}}">
                                @error('article_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="article_category">Article Category</label>
                                <input type="text" name="article_category" class="form-control @error('article_category') is-invalid @enderror" id="article_category" placeholder="Input article category here" value="{{$data->blog_category}}">
                                @error('article_category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="article_content">Article content</label>
                                <textarea name="article_content" class="form-control @error('article_content') is-invalid @enderror" id="open-source-plugins" placeholder="Input article content here">{{$data->blog_content}}</textarea>
                                @error('article_content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                    <button class="btn btn-danger w-25">Cancel</button>
                    <button id="btnSubmit2" type="submit" name="btn_submit" value="publish_btn" class="btn btn-success w-25">Submit</button> 
                    </div>
                </form> 
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
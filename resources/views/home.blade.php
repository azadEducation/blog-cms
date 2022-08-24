@extends('layouts.welcome')
@section('content')
    <div class="container-fluid p-4">
      <div class="row">
        @foreach ($blogArr as $blog)
        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            <!-- Card -->
            <div class="card mb-4 shadow-lg">
              <a href="blog-single.html" class="card-img-top">
                	<!-- Img  -->
                <img src="{{asset('blog_images/')}}{{$blog['image']}}" class="card-img-top rounded-top-md" alt=""></a>
              <!-- Card body -->
              <div class="card-body">
                <a href="javascript:;" class="fs-5 mb-2 fw-semi-bold d-block text-success">Courses</a>
                <h3><a href="blog-single.html" class="text-inherit">
                   {{$blog['title']}}
                  </a>
                </h3>
              </div>
            </div>
          </div>
    </div>
         
  @endforeach
  
@stop

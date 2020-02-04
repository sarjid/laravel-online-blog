@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <a href=" {{route('add.category')}} " class="btn btn-danger">Add Category</a>
         <a href="{{route('all.category')}} " class="btn btn-info">All Category</a>
         <a href="{{route('write.post')}} " class="btn btn-info">Write Post</a>
            <div class="mt-5">
                    <h3>Category Name: {{$post->title }} </h3>
                    <img src=" {{URL::to ($post->image) }} " style="height:340px; width:100%; " alt="">
                    <p>Category: {{ $post->name }} </p>
                    <p>Details: {{ $post->details }} </p>
            </div>

      </div>
    </div>
  </div>

@endsection

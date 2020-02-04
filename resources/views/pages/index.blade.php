@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($post as $row)
                   
      <div class="post-preview">
        <a href="post.html">
          <h4 class="post-title">
           {{$row->title}}
          </h4>
          <img src=" {{URL::to($row->image)}} " alt="post image" style="height:300px;">
        </a>
        <p class="post-meta">category 
          <a href="#"> {{$row->name}} </a>
          on Slug {{$row->slug}} </p>
      </div>
      @endforeach
      <hr>
     
      <!-- Pager -->
      <div class="clearfix float-right">
         {{$post->links()}}
        
      </div>
    </div>
  </div>

@endsection


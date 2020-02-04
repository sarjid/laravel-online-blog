@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <a href=" {{route('add.category')}} " class="btn btn-danger">Add Category</a>
         <a href=" {{route('all.category')}} " class="btn btn-info">All Category</a>
         <a href=" {{route('all.post')}} " class="btn btn-info">All post</a>


         @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
        <form action=" {{ route('store.post') }} " method="POST" enctype="multipart/form-data">
            @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" name="title" placeholder="Title Name" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group ">
                <label class="mt-4">Select Category</label>
                <select name="category_id" class="form-control" id="exampleFormControlSelect1">


                  @foreach ( $category as $row)
                  <option value=" {{ $row->id }} " > {{$row->name}} </option>
                  @endforeach

                </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Image</label>
              <input type="file" name="image" class="form-control" >
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" name="details" placeholder="Post Details" ></textarea>

            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

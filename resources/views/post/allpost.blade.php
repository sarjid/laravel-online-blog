
@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12  mx-auto">
         <a href=" {{route('add.category')}} " class="btn btn-danger">Add Category</a>
         <a href="{{route('all.category')}} " class="btn btn-info">All Category</a>
         <a href="{{route('write.post')}} " class="btn btn-info">Write Post</a>

         <table class="table table-responsive">
             <tr>
                 <th>id</th>
                 <th>Category</th>
                 <th>Title</th>
                 <th>image</th>
                 <th>Action</th>
             </tr>
              
             @foreach ($post as $row )
               
             <tr>
                 <td> {{$row->id}} </td>
                 <td> {{$row->name}} </td>
                 <td> {{$row->title}} </td>
                 <td> <img src=" {{URL::to($row->image)}} " style="height:40px; width:70px;" > </td>
                 <td>
                     <a href=" {{URL::to('edit/post/'.$row->id)}} " class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                     <a href=" {{URL::to('post/delete/'. $row->id)}} " id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                     <a href=" {{URL::to('post/view/'.$row->id)}} " class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                 </td>
             </tr>
             @endforeach

         </table>



      </div>
    </div>
  </div>

@endsection

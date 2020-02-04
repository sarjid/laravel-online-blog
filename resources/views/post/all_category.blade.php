@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <a href=" {{route('add.category')}} " class="btn btn-danger">Add Category</a>
         <a href="{{route('all.category')}} " class="btn btn-info">All Category</a>

         <table class="table table-responsive">
             <tr>
                 <th>id</th>
                 <th>Name</th>
                 <th>Slug</th>
                 <th>Created At</th>
                 <th>Action</th>
             </tr>
             @foreach ($category as $row )


             <tr>
                 <td> {{$row->id}} </td>
                 <td> {{$row->name}} </td>
                 <td> {{$row->slug}} </td>
                 <td> {{$row->created_at}} </td>
                 <td>
                     <a href=" {{URL::to('edit/cat/'.$row->id)}} " class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                     <a href=" {{URL::to('category/delete/'. $row->id)}} " id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                     <a href=" {{URL::to('category/view/'.$row->id)}} " class="btn btn-sm btn-info"><i class="far fa-eye"></i> View</a>
                 </td>
             </tr>
             @endforeach

         </table>



      </div>
    </div>
  </div>

@endsection

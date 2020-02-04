<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class BoloController extends Controller
{
    public function writePost(){
        return view('post.writepost');
    }

    public function addCategory(){
        return view('post.add_category');
    }

    public function storeCategory(Request $request){
        // validation
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        // insert in to database
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);

        if ($category) {
                $notification=array(
                    'messege'=>'Successfully Category Added',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.category')->with($notification);
        } else {

                $notification=array(
                    'messege'=>'Error Category Not Added',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);

        }

    }

    public function allcategory(){
        $category = DB::table('categories')->get();
        return view('post.all_category', compact('category'));
    }

    // view Data

    public function viewCat($id){


        $category = DB::table('categories')->where('id',$id)->first();
        return view('post.category_view' )->with('cat', $category);

    }

    // Delete Data

    public function deleteCat($id){

        $category = DB::table('categories')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Successfully Category Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);


    }

    // Edit category 
    public function editCat($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('post.editcat', compact('category'));
    }

    // Update category 
    public function updateCat(Request $request,$id){

         // validation
         $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);

        // insert in to database
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id', $id)->update($data);

        if ($category) {
                $notification=array(
                    'messege'=>'Successfully Category Updated',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.category')->with($notification);
        } else {

                $notification=array(
                    'messege'=>'Error Category Not Updated',
                    'alert-type'=>'error'
                );
                return Redirect()->route('all.category')->with($notification);

        }

    }


}

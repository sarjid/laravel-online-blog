<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postController extends Controller{

    public function writePost(){
        $category = DB::table('categories')->get();
        return view('post.writepost', compact('category'));
    }

     public function storePost(Request $request){

              // validation
         $validatedData = $request->validate([
            'title'=>'required|max:300',
            'details'=>'required',
            'image'=>'required|mimes:jpg,JPG,jpeg,png,PNG|max:10000',
            ]);

            // insert data

            $data = array();
            $data['category_id']= $request->category_id;
            $data['title']=$request->title;
            $data['details']= $request->details;
            $image=$request->file('image');

            if ($image) {
                $image_name=hexdec(uniqid());
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_Path='public/fontend/image/';
                $image_url = $upload_Path.$image_full_name;
                $success = $image->move($upload_Path,$image_full_name);
                $data['image']=$image_url;
                DB::table('posts')->insert($data);

                $notification=array(
                    'messege'=>'Successfully Post Inserted',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);

        }else{
                DB::table('posts')->insert($data);
                $notification=array(
                    'messege'=>'Successfully Post Inserted',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        }

        }


        public function allPost(){
            // $post = DB::table('posts')->get();
            $post = DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();

            return view('post.allpost',compact('post'));

        }


        public function viewpost($id){
            $post = DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id',$id)->first();
            return view('post.viewpost',compact('post'));


        }

        // edit post 

        public function editPost($id){
            $category = DB::table('categories')->get();
            $post = DB::table('posts')->where('id',$id)->first();
            return view('post.editpost',compact('category','post'));

        }
    
    // Update Post 

    public function updatePost(Request $request,$id){
        
              // validation
              $validatedData = $request->validate([
                'title'=>'required|max:300',
                'details'=>'required',
                'image'=>'mimes:jpg,JPG,jpeg,png,PNG|max:10000',
                ]);
    
                // insert data
    
                $data = array();
                $data['category_id']= $request->category_id;
                $data['title']=$request->title;
                $data['details']= $request->details;
                $image=$request->file('image');
    
                if ($image) {
                    $image_name=hexdec(uniqid());
                    $ext = strtolower($image->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_Path='public/fontend/image/';
                    $image_url = $upload_Path.$image_full_name;
                    $success = $image->move($upload_Path,$image_full_name);
                    $data['image']=$image_url;
                    unlink($request->old_photo);
                    DB::table('posts')->where('id',$id)->update($data);
    
                    $notification=array(
                        'messege'=>'Successfully Post Updated',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.post')->with($notification);
    
            }else{
                    $data['image']=$request->old_photo;
                    DB::table('posts')->where('id',$id)->update($data);
                    $notification=array(
                        'messege'=>'Successfully Post updated',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.post')->with($notification);
            }

    }

    // delete post with image 

    public function deletePost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->image;
        $delete = DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
            unlink($image);
            $notification=array(
                'messege'=>'Successfully Post deleted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
            
        }else {

            $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
            );
            return Redirect()->route('all.post')->with($notification);
            
        }

    }


}

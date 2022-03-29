<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Carbon\Carbon;
use App\Department;
use App\Organization;
use Image;


class PostController extends Controller
{
   public function getAllPosts()
    {
        $AllPostApps = Post::where('status','Approve')->orderBy('id', 'DESC')->get();
        $AllPostPens = Post::where('status','Pending')->orderBy('id', 'DESC')->get();
        $AllPostRejs = Post::where('status','Reject')->orderBy('id', 'DESC')->get();
        $OwnPostsApps =   Auth::user()->posts()->where('status','Approve')->orderBy('id','DESC')->get();
        $OwnPostsPens =   Auth::user()->posts()->where('status','Pending')->orderBy('id','DESC')->get();
        $OwnPostsRejs =   Auth::user()->posts()->where('status','Reject')->orderBy('id','DESC')->get();
        return view('dashboard_pages.all-posts', compact('AllPostApps','AllPostPens','AllPostRejs','OwnPostsApps','OwnPostsPens','OwnPostsRejs'));
    }

    public function getSinglePost($id)
    {
        $SinglePost = Post::find($id);
        return view('dashboard_pages.single-page', compact('SinglePost'));
    }

    public function getAddNewPost()
    {
        $categories = Category::all();
        $departments = Department::all();
        $organizations = Organization::all();
        return view('dashboard_pages.add-new-post',compact('categories','departments','organizations'));
    }



    public function postCreatePost(Request $request)
    {

         $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|not_in:0',
            'post_thumbnail' => 'required|mimes:jpeg,jpg,png',
            
            // '' => 'required|array',
        ]);



        $PostCreate                 = new Post;
        $PostCreate->title          = $request->title;
        $PostCreate->description    = $request->description;

        if ($request->hasFile('post_thumbnail')) {
           $fileName =  Carbon::now()->timestamp.$request->post_thumbnail->getClientOriginalName();
            // $request->post_thumbnail->storeAs('public/upload', $fileName);
           
            $img = Image::make($request->post_thumbnail);
            $img->resize(1000, 800, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save('storage/upload/'.$fileName, 100);
            $PostCreate->post_thumbnail = $fileName;
        }

       $PostCreate->status         = $request->status;
       $PostCreate->user_id        = Auth::user()->id;
       $PostCreate->category_id    =   $request->category_id;
       $PostCreate->department_id  =   $request->department_id;
       $PostCreate->organization_id =   $request->organization_id;

        $PostCreate->save();
 
        if(Auth::user()->role =='admin' || Auth::user()->role =='sub-admin'){
            session()->flash('Postnotification', 'Successfull Approve Your Post');
        }
        else{
           session()->flash('Postnotification', 'Thank you so much for submit your Post, and Waiting for Admin Approval');
        }

        return redirect()->route('AllPosts');
        
    }


    public function getTestPage()
    {
        $categories = Category::with('posts')->get();
        return view('dashboard_pages.test', compact('categories'));
    }

   
    
    public function getEditPost($id)
    {   $categories = Category::all();
        $EditPost = Post::find($id);
        $departments = Department::all();
        $organizations = Organization::all();
        return view('dashboard_pages.edit-page',compact('EditPost','categories','departments','organizations'));
    }

   
    public function postUpdatePost(Request $request, $id)
    {
 
        $UpdatePost                 = Post::find($id);
        $UpdatePost->title          = $request->title;
        $UpdatePost->description    = $request->description;

        if ($request->hasFile('post_thumbnail')) {

        $filen = public_path().'/storage/upload/'.$UpdatePost->post_thumbnail;
        \File::delete($filen);
    
        $fileName = Carbon::now()->timestamp.$request->post_thumbnail->getClientOriginalName();
        // $request->post_thumbnail->storeAs('public/upload', $fileName);

         $img = Image::make($request->post_thumbnail);
         $img->resize(1000, 800, function ($constraint) {
                $constraint->aspectRatio();
         });
        $img->save('storage/upload/'.$fileName, 100);
        $UpdatePost->post_thumbnail = $fileName ;
        
        }

       $UpdatePost->status          = $request->status;
       $UpdatePost->category_id     = $request->category_id;
       $UpdatePost->department_id   =   $request->department_id;
       $UpdatePost->organization_id =   $request->organization_id;

        $UpdatePost->save();
        return redirect()->route('AllPosts');
    }

  
    public function getDeletePost($id)
    {
        $getDeletePost = Post::find($id);
       
        if($getDeletePost->delete()){ 
            $filen = public_path().'/storage/upload/'.$getDeletePost->post_thumbnail;
            \File::delete($filen);
        }
      return redirect()->route('AllPosts');

    }



}

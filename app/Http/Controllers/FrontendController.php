<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Auth;
use App\Hit;
use App\Advertisement;
use App\Department;
use App\Organization;
use App\Gallery;

class FrontendController extends Controller
{
	
     public function getFrontend()
    {
    	$AllPosts = Post::where('status','Approve')->orderBy('id','DESC')->get();
    	$Notice2 = Post::where([['status','Approve'],['category_id', 3]])->take(30)->orderBy('id','DESC')->get();
		$categories = Category::all();
		// $categoriesss = Category::with('posts')->get();

		$showAddImages = Advertisement::all();

		$Alldeptnews = Post::where([['status','Approve'],['category_id', 1]])->take(4)->orderBy('id','DESC')->get();
    	$AllClubsnews = Post::where([['status','Approve'],['category_id', 2]])->take(4)->orderBy('id','DESC')->get();
    	$Notice = Post::where([['status','Approve'],['category_id', 3]])->take(4)->orderBy('id','DESC')->get();
    	$Education = Post::where([['status','Approve'],['category_id', 4]])->take(4)->orderBy('id','DESC')->get();
    	$Achievement = Post::where([['status','Approve'],['category_id', 5]])->take(4)->orderBy('id','DESC')->get();
    	$Playing = Post::where([['status','Approve'],['category_id', 6]])->take(4)->orderBy('id','DESC')->get();
    	$ICT = Post::where([['status','Approve'],['category_id', 7]])->take(4)->orderBy('id','DESC')->get();
    	$Jobs = Post::where([['status','Approve'],['category_id', 8]])->take(4)->orderBy('id','DESC')->get();

        $Galleries = Gallery::orderBy('id','DESC')->take(2)->get();
		return view('frontend', compact('AllPosts','Notice2','categories','showAddImages','Alldeptnews','AllClubsnews','Notice', 'Education', 'Achievement', 'Playing', 'ICT', 'Jobs','Galleries'));

	}
    
    public function getCategory($id)
    {
    	$AllCategories = Category::find($id)->posts()->where("status","Approve")->orderBy('id','DESC')->take(10)->get();
    	return view('forntend_pages.category', compact('AllCategories'));
    }

    public function getDepartment($id)
    {
    	$AllDepartment = Department::find($id)->posts()->where("status","Approve")->orderBy('id','DESC')->take(10)->get();
    	return view('forntend_pages.department', compact('AllDepartment'));
    }

     public function getOrganization($id)
    {
    	$AllOrganization = Organization::find($id)->posts()->where("status","Approve")->orderBy('id','DESC')->take(10)->get();
    	return view('forntend_pages.organization', compact('AllOrganization'));
    }


    public function getGallery()
    {
         $Galleries =  Gallery::orderBy('id', 'DESC')->get();
         return view('forntend_pages.gallery', compact('Galleries'));
    }

    public function search(Request $request)
    {
    	$term = $request->get('query');
		$posts = Post::
		where(function($query) use ($term) {
			$query->where('title', 'LIKE', '%'.$term.'%');
			$query->orWhere('description', 'LIKE', '%'.$term.'%');
		})
		
		->where("status", "Approve")
		->get();

		
		return view('forntend_pages.category', ['AllCategories' => $posts]);
	}


	public function getSinglePage(Request $request, $id)
	{
		$SinglePosts = Post::find($id);
		$SinglePosts->hits = $SinglePosts->hits + 1;
		$SinglePosts->save();
		
		return view('forntend_pages.single', compact('SinglePosts'));
	}



}

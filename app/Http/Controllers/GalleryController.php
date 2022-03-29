<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Gallery;
use Carbon\Carbon;
use Image;

class GalleryController extends Controller
{
    public function getAllGallery()
    {
    	$Galleries = Gallery::orderBy('id','DESC')->get();
		return view('dashboard_pages.all-gallery', compact('Galleries'));
    }

     public function getAddNewGallery()
    {
    	return view('dashboard_pages.add-new-gallery');
    }


    public function postCreateGallery(Request $request)
    {
    		$CreateGallery = new Gallery;

    		$CreateGallery->title 		=  $request->title;
    		$CreateGallery->description =  $request->description;

			if($request->hasFile('gallery_img')){
				$fileName = Carbon::now()->timestamp.$request->gallery_img->getClientOriginalName();
				// $request->gallery_img->storeAs('public/gallery', $fileName);
				
				$img = Image::make($request->gallery_img);
	            $img->resize(1000, 850, function ($constraint) {
	                $constraint->aspectRatio();
	            });
	            $img->save('storage/gallery/'.$fileName, 100);

				$CreateGallery->gallery_img = $fileName;
    		}
 		
 		$CreateGallery->save();
		return redirect()->route('AllGallery');
    }



    public function getEditGallery($id)
    {
        $EditGallery = Gallery::find($id);
        return view('dashboard_pages.editgallery', compact('EditGallery'));
    
    }


    public function postUpdateGallery(Request $request, $id)
    {
        
        $UpdateGallery = Gallery::find($id);
        $UpdateGallery->title  = $request->title;
        $UpdateGallery->description  = $request->description;

        if( $request->hasFile('gallery_img') ){

            $filen = public_path().'/storage/gallery/'.$UpdateGallery->gallery_img;
             \File::delete($filen);
            
            $fileName = Carbon::now()->timestamp.$request->gallery_img->getClientOriginalName();
            $img = Image::make($request->gallery_img);
            $img->resize(1000, 850, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save('storage/gallery/'.$fileName, 100);
            $UpdateGallery->gallery_img = $fileName;
        }

        $UpdateGallery->save();
        return redirect()->route('AllGallery');
    }







}

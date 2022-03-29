<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Carbon\Carbon;
class AdvertiseController extends Controller
{
   public function getadvertise()
   {   
       $showAddImages = Advertisement::all();
      return view('dashboard_pages.advertise',compact('showAddImages'));
   }

   public function getadvertise_Edit($id)
    {
          $advertise_Edit = Advertisement::find($id);
          return view('dashboard_pages.advertiseEdit',compact('advertise_Edit'));
    }


 public function postadvertise_update(Request $request,$id)
    {
        $BannerImgUpdate                 = Advertisement::find($id);
        $BannerImgUpdate->title          = $request->title;
        
        if ($request->hasFile('add_image')) {


         $filen = public_path().'/storage/addvertisefolder/'.$BannerImgUpdate->add_image;
          \File::delete($filen);

           $fileName =  Carbon::now()->timestamp.$request->add_image->getClientOriginalName();
            $request->add_image->storeAs('public/addvertisefolder', $fileName);
            $BannerImgUpdate->add_image = $fileName;
          }


       $BannerImgUpdate->image_url   = $request->image_url;
       $BannerImgUpdate->show_hide   = $request->show_hide;

       
       $ending_date  = Carbon::parse($request->ending_date)->format('Y-m-d H:i:s'); 

       $BannerImgUpdate->ending_date = $ending_date;


        $BannerImgUpdate->save();
 
        return redirect()->route('Advertise');
        // return $BannerImgUpdate; 
   }



   // public function showAddImage()
   // {
   //      $showAddImages = Advertisement::all();
      
   //     return view('dashboard_pages.advertise')->with($showAddImages,'showAddImages');
   // }



  


}

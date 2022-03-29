<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function getLogoShow()
    {
    	$LogoShow = Setting::all();
		  return view('dashboard_pages/logo',compact('LogoShow'));
    }



    public function getLogoEdit(Request $request,$id)
    {
    	$LogoEdit = Setting::find($id);
    	return view('dashboard_pages/LogoEdit',compact('LogoEdit'));
    }


    public function postLogoUpload(Request $request, $id)
    {
    	
    	$LogoUpload = Setting::find($id);

    	 if ($request->hasFile('logo')) {


         $filen = public_path().'/storage/logo/'.$LogoUpload->value;
          \File::delete($filen);

           $fileName =  Carbon::now()->timestamp.$request->logo->getClientOriginalName();
            $request->logo->storeAs('public/logo', $fileName);
            $LogoUpload->value = $fileName;
          }

          $LogoUpload->save();

          return redirect()->route('logoshow');


    }


}

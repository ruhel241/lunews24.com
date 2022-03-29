<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Carbon\Carbon;

use Auth;

class AllUserController extends Controller
{
   public function AllUsersShow()
   {
   		$AllUsers = User::orderBy('id', 'DESC')->get();
		  return view('dashboard_pages.all-users',compact('AllUsers'));
   }


   public function getAdd_new_User()
   {  
         return view('dashboard_pages/add_new_user');
   }

   public function postAdd_new_UserCreate(Request $request)
   {

      $NewUserCreate = new User;

      $NewUserCreate->first_name = $request->first_name;
      $NewUserCreate->last_name = $request->last_name;
      $NewUserCreate->mobile = $request->mobile;
      $NewUserCreate->dept = $request->dept;
      $NewUserCreate->batch = $request->batch;
      $NewUserCreate->gender = $request->gender;
      $NewUserCreate->role = $request->role;
      $NewUserCreate->status =  1;
      $NewUserCreate->email = $request->email; 
      $NewUserCreate->password = '$2y$10$1MYHLVV6q.BJNRO5QNvfBOS8cXuDVEakJebP4BL4qS3AO09/ZrQd.';

      $NewUserCreate->save();
      return redirect()->route('All.Users');
   }

   public function UserProfile($id)
   {
   		$UserProfile = User::find($id);
   		return view('dashboard_pages.userprofile',compact('UserProfile'));
   }


   public function UserProfileEdit(Request $request,$id)
   {
   		$UserProfileEdit = User::find($id);
      return view('dashboard_pages.UserProfileEdit',compact('UserProfileEdit'));
   }



   public function userupdate(Request $request,$id)
   {
        
         $UserUpdate = User::find($id);
         $UserUpdate->first_name    = $request->first_name;
         $UserUpdate->last_name     = $request->last_name;
         $UserUpdate->mobile        = $request->mobile;
         $UserUpdate->dept          = $request->dept;
         $UserUpdate->batch         = $request->batch;
         $UserUpdate->gender        = $request->gender;
       
      if(Auth::user()->role == 'admin' || Auth::user()->role == 'sub-admin'){
          $UserUpdate->role  = $request->role;
          $UserUpdate->email = $request->email;
       }else{
          $UserUpdate->role  = Auth::user()->role;
          $UserUpdate->email = Auth::user()->email;
      }

      if ($request->hasFile('avatar')) {
            
            $filen = public_path().'/storage/avatars/'.$UserUpdate->avatar;
             \File::delete($filen);

            $fileName =  Carbon::now()->timestamp.$request->avatar->getClientOriginalName();
            $request->avatar->storeAs('public/avatars', $fileName);
            $UserUpdate->avatar = $fileName;
         }
         
          $UserUpdate->save();

         return redirect()->route('UserProfile', $UserUpdate->id);
   }



   public function UserDelete($id)
   {
      $UserDelete = User::findOrFail($id);
      $UserDelete->posts()->delete();
      $UserDelete->delete();

      return redirect()->route('All.Users');
   }

}

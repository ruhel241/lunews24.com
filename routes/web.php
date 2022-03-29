<?php

use App\User;
// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input as input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();


// FrontEnd Route
Route::get('/', 'FrontendController@getFrontend')->name('FrontEnd');
// Posts
Route::get('/Newstricker','FrontendController@getNewstricker')->name('Newstricker');
//Category
Route::get('/category/{id}','FrontendController@getCategory')->name('Category');
//Department Category
Route::get('/department/{id}', 'FrontendController@getDepartment')->name('Department');
//Organization
Route::get('/organization/{id}', 'FrontendController@getOrganization')->name('Organization'); 
// Gallery
Route::get('/gallery', 'FrontendController@getGallery')->name('Gallery');
// search
Route::get('/search', 'FrontendController@search')->name('search');
// single page
Route::get('/single-page/{id}','FrontendController@getSinglePage')->name('SinglePage');



// Auth
// Route::get('/verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::get('/change/password', function () {
    return view('auth.ChangePassword');
})->name('Change_Password');

Route::post('/changing/password', function () {
   $user = User::find(Auth::user()->id);
if(Hash::check(Input::get('passwordold'),$user['password']) && Input::get('password') == Input::get('password_confirmation')){
	$user->password = bcrypt(Input::get('password'));
 	$user->save();

 	Session::flash('PasswordUpadate', 'Successfully Change Your Password');
 	return redirect()->route('dashboard');
 }
 else
 {
	Session::flash('CheckPassword', 'Sorry Your password Does not Match, Plz Retry');
 	return back();
 }

})->name('ChangePassword');


// Dashboard Route
Route::get('/dashboard', 'HomeController@getdashboard')->name('dashboard')->middleware('auth');
// Post 
Route::get('/all-posts', 'PostController@getAllPosts')->name('AllPosts')->middleware('auth');
Route::get('/add-new-post', 'PostController@getAddNewPost')->name('AddNewPost')->middleware('auth');
Route::post('/create-post','PostController@postCreatePost')->name('CreatePost')->middleware('auth');
Route::get('/single-post/{id}','PostController@getSinglePost')->name('SinglePost')->middleware('auth');
Route::get('/edit-post/{id}','PostController@getEditPost')->name('EditPost')->middleware('auth');
Route::post('/update-post/{id}','PostController@postUpdatePost')->name('UpdatePost')->middleware('auth');
Route::get('/delete-post/{id}','PostController@getDeletePost')->name('DeletePost')->middleware('auth');

// category
Route::get('/all-category', 'CategoryController@getAllCategories')->name('AllCategories')->middleware('auth');
Route::post('/add-new-category','CategoryController@getAddNewCategory')->name('AddNewCategory')->middleware('auth');
Route::get('/edit-category/{id}','CategoryController@getEditCategory')->name('EditCategory')->middleware('auth');
Route::post('/update-category/{id}','CategoryController@getUpdateCategory')->name('UpdateCategory')->middleware('auth');
Route::get('/delete-category/{id}','CategoryController@getCategoryDelete')->name('CategoryDelete')->middleware('auth');

// Department Category
Route::get('/all-departments', 'CategoryController@getAllDepartments')->name('AllDepartments');
Route::post('/add-department','CategoryController@postAddDepartment')->name('AddDepartment');
Route::get('/edit-department/{id}','CategoryController@getEditDepartment')->name('EditDepartment');
Route::post('/update-department/{id}','CategoryController@postUpdateDepartment')->name('UpdateDepartment');
Route::get('/delete-department/{id}','CategoryController@getDeleteDepartment')->name('DeleteDepartment');


// Organization
Route::get('/all-organization', 'CategoryController@getAllOrgenization')->name('AllOrganization');
Route::post('/add-organization','CategoryController@postAddOrganization')->name('AddOrganization');
Route::get('/edit-organization/{id}','CategoryController@getEditOrganization')->name('EditOrganization');
Route::post('/update-organization/{id}','CategoryController@postUpdateOrganization')->name('UpdateOrganization');
Route::get('/delete-organization/{id}','CategoryController@getDeleteOrganization')->name('DeleteOrganization');


// Gallery
Route::get('/all-gallery', 'GalleryController@getAllGallery')->name('AllGallery')->middleware('auth');
Route::get('/add-new-gallery','GalleryController@getAddNewGallery')->name('AddGallery');
Route::post('/create-gallery','GalleryController@postCreateGallery')->name('CreateGallery');
Route::get('/edit-gallery/{id}','GalleryController@getEditGallery')->name('EditGallery');
Route::post('/update-gallery/{id}','GalleryController@postUpdateGallery')->name('UpdateGallery');

// Advertise 
Route::get('/advertise', 'AdvertiseController@getadvertise')->name('Advertise')->middleware('auth');
// Advertise option 
//BannerImg
Route::get('/advertise_Edit/{id}', 'AdvertiseController@getadvertise_Edit')->name('Advertise_Edit')->middleware('auth');
Route::post('/advertise_update/{id}', 'AdvertiseController@postadvertise_update')->name('Advertise.update')->middleware('auth');


// all user
Route::get('/all-users','AllUserController@AllUsersShow')->name('All.Users')->middleware('auth');
Route::get('/UserProfile/{id}','AllUserController@UserProfile')->name('UserProfile')->middleware('auth');
Route::get('/UserProfileEdit/{id}','AllUserController@UserProfileEdit')->name('UserProfile.Edit')->middleware('auth');
Route::post('/userProfile_update/{id}','AllUserController@userupdate')->name('UserprofileUpdate')->middleware('auth');
Route::get('/user_delete/{id}','AllUserController@userdelete')->name('UserDelete')->middleware('auth');

// Route::get('/userProfile_update/{id}', function () {
//     return "hi";
// })->name('UserprofileUpdate');

Route::get('/Add_new_User','AllUserController@getAdd_new_User')->name('Add.User');
Route::post('/Add_new_Create','AllUserController@postAdd_new_UserCreate')->name('Add.Create');

// Route::get('/test', 'PostController@getTestPage')->name('TestPage');



// Settings Logo Upload
Route::get('/logo_show','SettingController@getLogoShow')->name('logoshow');
Route::get('/logo_Edit/{id}','SettingController@getLogoEdit')->name('logo.Edit');
Route::post('/logo_Upload/{id}','SettingController@postLogoUpload')->name('logo.upload');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Department;
use App\Organization;

class CategoryController extends Controller
{
    
    public function getAllCategories()
    {
        $AllCategories = Category::all();
        return view('dashboard_pages.categories',compact('AllCategories'));
    }

    
    public function getAddNewCategory(Request $request)
    {
       $AddNewCategory = new Category;
       $AddNewCategory->title = $request->title;
       $AddNewCategory->slug = $request->slug;
       $AddNewCategory->save();
       return redirect()->route('AllCategories');
    }

    public function getEditCategory($id)
    {
        $EditCategory = Category::find($id);
        return view('dashboard_pages.editcategorypage',compact('EditCategory'));

    }

    public function getUpdateCategory(Request $request, $id)
    {
       $UpdateCategory = Category::find($id);
       $UpdateCategory->title = $request->title;
       $UpdateCategory->slug = $request->slug;
       $UpdateCategory->save();
       return redirect()->route('AllCategories');
    }

   
    public function getCategoryDelete($id)
    {
        $CategoryDelete = Category::find($id);
        $CategoryDelete->delete();
        return redirect()->route('AllCategories');
    }


    // Department Category
    public function getAllDepartments()
    {
        $Departments = Department::all();
        return view('dashboard_pages.all-departments',compact('Departments'));
    }

    public function postAddDepartment(Request $request)
    {
      $AddDepartment = new Department;
      $AddDepartment->title = $request->title;
      $AddDepartment->slug = $request->slug;
      $AddDepartment->save();
      return redirect()->route('AllDepartments');
    }


    public function getDeleteDepartment($id)
    {
      $DeleteDepartment = Department::find($id);
      $DeleteDepartment->delete();
      return redirect()->route('AllDepartments');

    }


    public function getEditDepartment($id)
    {
      $EditDepartment = Department::findOrFail($id);
      return view('dashboard_pages.editdepartment', compact('EditDepartment'));
    }


    public function postUpdateDepartment(Request $request, $id)
    {
      $UpdateDepartment  = Department::findOrFail($id);
      $UpdateDepartment->title = $request->title;
      $UpdateDepartment->slug  = $request->slug;
      $UpdateDepartment->save();
      return redirect()->route('AllDepartments');
    }


// Organization Category
    public function getAllOrgenization()
    {
        $Organizations = Organization::all();
        return view('dashboard_pages.all-organizations',compact('Organizations'));
    }

    public function postAddOrganization(Request $request)
    {
      $AddOrganization = new Organization;
      $AddOrganization->title = $request->title;
      $AddOrganization->slug = $request->slug;
      $AddOrganization->save();
      return redirect()->route('AllOrganization');
    }

     public function getEditOrganization($id)
    {
      $EditOrganization = Organization::findOrFail($id);
      return view('dashboard_pages.edit-organization', compact('EditOrganization'));
    }

     public function postUpdateOrganization(Request $request, $id)
    {
      $UpdateOrganization  = Organization::findOrFail($id);
      $UpdateOrganization->title = $request->title;
      $UpdateOrganization->slug  = $request->slug;
      $UpdateOrganization->save();
      return redirect()->route('AllOrganization');
    }


    public function getDeleteOrganization($id)
    {
      $DeleteOrganization = Organization::find($id);
      $DeleteOrganization->delete();
      return redirect()->route('AllOrganization');

    }


   


   











  
}

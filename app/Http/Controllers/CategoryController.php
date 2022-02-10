<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('create-category', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'parent_id' =>$request->parent_id
            ]);
            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }
    public function editCategory(Request $request,$id)
    {
        $category = Category::where('id', $id)->orderby('name', 'asc')->get();
        $categoriesParents = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('update-category', compact('category','categoriesParents'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'parent_id' => 'nullable|numeric'
            ]);
            $categoryUp = Category::find($id);
            $categoryUp->name = $request->input('name');
            $categoryUp->parent_id = $request->input('parent_id');
            $categoryUp->update();
            return redirect('category/create')->with('success', 'Category has been updated successfully.');
        }
    }
    public function deleteCategory($id)
    {
        Category::where('id',$id)->delete();
        return redirect('category/create')->with('danger', 'Category has been deleted successfully.');
    }
}

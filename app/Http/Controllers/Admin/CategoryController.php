<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' =>  'required|string|max:100|unique:categories,name',
           'serial_no' => 'nullable|numeric|unique:categories,serial_no',
           'status' => 'required|string|in:active,inactive'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->serial_no = $request->serial_no;
        $category->status = $request->status;
        $category->save();

        return back()->with('success', 'Category added successfully');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  'required|string|max:100|unique:categories,name,'.$id,
            'serial_no' => 'nullable|numeric|unique:categories,serial_no,'.$id,
            'status' => 'required|string|in:active,inactive'
         ]);

         $category = Category::findOrFail($id);
         $category->name = $request->name;
         $category->slug = Str::slug($request->name);
         $category->serial_no = $request->serial_no;
         $category->status = $request->status;
         $category->save();

         return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }



    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted successfully');
    }


}

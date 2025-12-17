<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::get();
        return view('admin.subcategories.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
            'serial_no' => 'nullable|numeric|unique:subcategories,serial_no',
            'status' => 'required|in:active,inactive'
        ]);

        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name, '-');
        $subcategory->serial_no = $request->serial_no;
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()
            ->route('admin.subcategories')
            ->with('success', 'Subcategory added successfully');
    }
}
    
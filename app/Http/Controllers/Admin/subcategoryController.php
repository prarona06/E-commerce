<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\subcategeory;


class subcategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::get();
        $data['subcategories']=Subcategory::with('category')->get();//eger loding or lezy loading
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
    public function edit($id)
    {
        $data['subcategory'] = Subcategory::findOrFail($id);
        $data['categories'] = Category::get();
        return view('admin.subcategories.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:subcategories,name,'.$id,
            'category_id' => 'required|exists:categories,id',
            'serial_no' => 'nullable|numeric|unique:subcategories,serial_no,'.$id,
            'status' => 'required|in:active,inactive'
        ]);

        $subcategory = Subcategory::findOrFail($id);

        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name, '-');
        $subcategory->serial_no = $request->serial_no;
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()
            ->route('admin.subcategories')
            ->with('success', 'Subcategory updated successfully');
    }

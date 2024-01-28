<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Category, SubCategory, ChildCategory};
use Illuminate\Validation\Rule;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $child_categories = ChildCategory::with(['category','sub_category'])->paginate(8);
        return view('admin.categories.childCategory.childCategory', compact('child_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $sub_categories = SubCategory::get();
        return view('admin.categories.childCategory.add', compact('categories','sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_category' => 'required',
            'sub_category' => 'required',
            'name' => 'required|unique:child_categories',
        ]);

        $child_category = ChildCategory::create([
            'category_id' => $request->parent_category,
            'sub_category_id' => $request->sub_category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        $notification = ['message'=>'Child Category Added Successfully', 'alert-type'=>'success'];
        return redirect()->route('childCategory.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        $sub_categories = SubCategory::get();
        $child_category = ChildCategory::find($id);
        return view('admin.categories.childCategory.edit', compact('categories','sub_categories','child_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'parent_category' => 'required',
            'sub_category' => 'required',
            'name' => 'required',Rule::unique('child_categories')->ignore($id)
        ]);

        $child_category = ChildCategory::where('id', $id)->update([
            'category_id' => $request->parent_category,
            'sub_category_id' => $request->sub_category,
            'name' => $request->name,
        ]);

        $notification = ['message'=>'Child Category Updated Successfully', 'alert-type'=>'success'];
        return redirect()->route('childCategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

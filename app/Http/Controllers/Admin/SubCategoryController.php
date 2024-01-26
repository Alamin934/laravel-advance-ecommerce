<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Category,SubCategory};

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $sub_categories = SubCategory::with('category')->get();
        return view('admin.categories.subCategory.subCategory', compact('categories','sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_category' => 'required',
            'sub_category_name' => 'required',
        ]);

        $sub_category = SubCategory::create([
            'name' => $request->sub_category_name,
            'slug' => Str::slug($request->sub_category_name, '-'),
            'category_id' => $request->parent_category,
        ]);
        $notification = ['message'=>'Sub Category Added successfully', 'alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

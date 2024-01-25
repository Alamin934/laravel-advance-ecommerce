<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
        ]);
        $notification = ['message'=>'Category deleted successfully', 'alert-type'=>'success'];
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
        $category = Category::find($id);
        return $category;
        // return view('admin.category', ['edit_cat' => $category]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'edit_cat_name' => 'required',
        ]);
        $category = Category::where('id', $request->edit_cat_id)->update([
            'name' => $request->edit_cat_name,
        ]);
        $notification = ['message'=>'Category Updated successfully', 'alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        $notification = ['message'=>'Category deleted successfully', 'alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}

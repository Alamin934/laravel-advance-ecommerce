<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\{Category, SubCategory, ChildCategory, Brand};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::with(['sub_categories','child_categories'])->get();
        $brands = Brand::get();
        return view('admin.products.add-product', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('images');
        // $extension = $file->getClientOriginalExtension();
        dd($file);

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

    
    public function dependedChildCategory($id){
        $childCategories = ChildCategory::where('sub_category_id', $id)->pluck('name', 'id');
        if(!empty($childCategories)){
            return json_encode($childCategories);
        }else{
            return json_encode('');

        }
    }
}

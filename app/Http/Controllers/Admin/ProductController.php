<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\{Category, SubCategory, ChildCategory, Brand};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $validated = $request->validate([
            'title' => 'required|unique:products|max:255',
            'code' => 'required|unique:products',
            'sub_category' => 'required',
            'sub_category' => 'required',
            'purchase_price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
            'description' => 'required',
            'thumbnail' => 'required|file|image',
        ]);
        

        // Thumbnail
        $thumbnail = '';
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $original_name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_file_name = preg_split("/[\s\-\.]+/", $original_name)[0].'-'.date('d-m-Y-H-i-s').'.'.$extension;
            $thumbnail = $new_file_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(650, 450);
            $image->toPng()->save('admin/assets/files/products/'.$new_file_name);
        }
        
        // Gallery Images
        $images = [];
        if($request->hasfile('images')){
            $files = $request->file('images');
            $count = 1;
            foreach ($files as $file) {
                $original_name = preg_split("/[\s\-\.]+/", $file->getClientOriginalName())[0];
                if($original_name){
                    $original_name = $original_name.$count++;
                    $new_file_name = $original_name.'-'.date('d-m-Y-H-i-s').'.'.$file->extension();
                    $images[] = $new_file_name;

                    // store images in folder
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $image->contain(650, 450);
                    $image->toPng()->save('admin/assets/files/products/'.$new_file_name);
                }

            }

        }

        // Store Product in database
        $sub_category = SubCategory::find($request->sub_category);
        $product = Product::create([
            'user_id' => auth()->user()->id,
            'category_id' => $sub_category->category_id,
            'sub_category_id' => $request->sub_category,
            'child_category_id' => $request->child_category,
            'brand_id' => $request->brand,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'thumbnail' => $thumbnail,
            'images' => $images,
            'code' => $request->code,
            'unit' => $request->unit,
            'tags' => $request->tags,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'video' => $request->video,
            'stock_quantity' => $request->stock_quantity,
            'featured' => $request->featured,
            'status' => $request->status,
        ]);

        $notification = ['message'=>'Product Added successfully', 'alert-type'=>'success'];
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

    
    public function dependedChildCategory($id){
        $childCategories = ChildCategory::where('sub_category_id', $id)->pluck('name', 'id');
        if(!empty($childCategories)){
            return json_encode($childCategories);
        }else{
            return json_encode('');

        }
    }
}

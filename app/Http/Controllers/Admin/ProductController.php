<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Jobs\StoreAndUpdateProduct;
use App\Models\{Category, SubCategory, ChildCategory, Brand};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::orderByDesc('id')->paginate(20);
        return view('admin.products.products', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.add-product', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'title' => 'required|unique:products|max:255',
            'code' => 'required|unique:products',
            'category' => 'required',
            'purchase_price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
            'description' => 'required',
            'thumbnail' => 'required|file|image',
            'color' => 'array|between:0,5',
        ]);
        

        // Thumbnail
        $thumbnail = '';
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $original_name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_file_name = preg_split("/[\s\-\.]+/", $request->title)[0].'-'.date('d-m-Y-H-i-s').'.'.$extension;
            $thumbnail = $new_file_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(650, 450);
            $image->toPng()->save('assets/admin/files/products/'.$new_file_name);
        }
        
        // Gallery Images
        $images = [];
        if($request->hasfile('images')){
            $files = $request->file('images');
            $count = 1;
            foreach ($files as $file) {
                $original_name = preg_split("/[\s\-\.]+/", $request->title)[0];
                if($original_name){
                    $original_name = $original_name.$count++;
                    $new_file_name = $original_name.'-'.date('d-m-Y-H-i-s').'.'.$file->extension();
                    $images[] = $new_file_name;

                    // store images in folder
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $image->contain(650, 450);
                    $image->toPng()->save('assets/admin/files/products/'.$new_file_name);
                }

            }

        }

        // Store Product in database
        $product = [
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'child_category_id' => $request->child_category,
            'brand_id' => $request->brand,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'thumbnail' => $thumbnail,
            'images' => empty($images) ? null : $images,
            'code' => $request->code,
            'unit' => $request->unit,
            'tags' => $request->tags,
            'color' => $request->color,
            'size' => $request->size,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'video' => $request->video,
            'stock_quantity' => $request->stock_quantity,
            'home_banner' => $request->home_banner,
            'home_slider' => $request->home_slider,
            'featured' => $request->featured,
            'status' => $request->status,
        ];
        StoreAndUpdateProduct::dispatch($product);

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
        $product = Product::find($id);
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $childCategories = ChildCategory::get();
        $brands = Brand::get();
        return view('admin.products.edit-product', compact('product','categories','subCategories','childCategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',Rule::unique('products')->ignore($id),
            'code' => 'required',Rule::unique('products')->ignore($id),
            'category' => 'required',
            'purchase_price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
            'description' => 'required',
            'color' => 'array|between:0,5',
        ]);

        if($request->hasfile('images') && !empty($request->old_images)){
            foreach ($request->old_images as $image) {
                unlink(public_path('assets/admin/files/products/'.$image));
            }
        }
        if($request->hasfile('thumbnail') && $request->old_thumbnail != null){
            unlink(public_path('assets/admin/files/products/'.$request->old_thumbnail));
        }
        

        // Thumbnail
        $thumbnail = '';
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $original_name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_file_name = preg_split("/[\s\-\.]+/", $request->title)[0].'-'.date('d-m-Y-H-i-s').'.'.$extension;
            $thumbnail = $new_file_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(650, 450);
            $image->toPng()->save('assets/admin/files/products/'.$new_file_name);
        }
        
        // Gallery Images
        $images = [];
        if($request->hasfile('images')){
            $files = $request->file('images');
            $count = 1;
            foreach ($files as $file) {
                $original_name = preg_split("/[\s\-\.]+/", $request->title)[0];
                if($original_name){
                    $original_name = $original_name.$count++;
                    $new_file_name = $original_name.'-'.date('d-m-Y-H-i-s').'.'.$file->extension();
                    $images[] = $new_file_name;

                    // store images in folder
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $image->contain(650, 450);
                    $image->toPng()->save('assets/admin/files/products/'.$new_file_name);
                }
            }
        }

        // Store Product in database
        $sub_category = SubCategory::find($request->sub_category);
        $product = Product::where('id', $id)->update([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'child_category_id' => $request->child_category,
            'brand_id' => $request->brand,
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $request->hasfile('thumbnail') ? $thumbnail : $request->old_thumbnail,
            'images' => $request->hasfile('images') ? $images : $request->old_images,
            'code' => $request->code,
            'unit' => $request->unit,
            'tags' => $request->tags,
            'color' => $request->color,
            'size' => $request->size ?? explode(" ",$request->old_size),
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'video' => $request->video,
            'stock_quantity' => $request->stock_quantity,
            'home_banner' => $request->home_banner,
            'home_slider' => $request->home_slider,
            'featured' => $request->featured,
            'status' => $request->status,
        ]);

        $notification = ['message'=>'Product Updated successfully', 'alert-type'=>'success'];
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        if(!empty($product->images)){
            foreach ($product->images as $image) {
                unlink(public_path('assets/admin/files/products/'.$image));
            }
        }
        unlink(public_path('assets/admin/files/products/'.$product->thumbnail));

        $product->delete();
        return response()->json(['status'=> 'success']);
    }

    
    public function dependedSubCategory($id){
        $subCategories = SubCategory::where('category_id', $id)->pluck('name', 'id');
        if(!empty($subCategories)){
            return response()->json($subCategories);
        }
    }

    
    public function dependedChildCategory($id){
        $childCategories = ChildCategory::where('sub_category_id', $id)->pluck('name', 'id');
        if(!empty($childCategories)){
            return response()->json($childCategories);
        }
    }

    public function changeStatus($status) {
        if(is_numeric($status)){
            Product::where('id', $status)->update(['status'=>'on']);
            return response()->json(['status'=>'Status Active Successfully']);
        }else{
            $statusId = explode(" ", $status)[0];
            Product::where('id', $statusId)->update(['status'=>null]);
            return response()->json(['status'=>'Status DeActive Successfully']);
        }
    }

    public function changeFeatured($featured) {
        if(is_numeric($featured)){
            Product::where('id', $featured)->update(['featured'=>'on']);
            return response()->json(['status'=>'Featured Active Successfully']);
        }else{
            $featuredId = explode(" ", $featured)[0];
            Product::where('id', $featuredId)->update(['featured'=>null]);
            return response()->json(['status'=>'Featured DeActive Successfully']);
        }
    }

    public function filterProduct(Request $request){
        $products = "";
        if($request->cat_id != 'all'){
            $products = Product::where('category_id', $request->cat_id)->orderByDesc('id')->get();
        }
        if($request->brand_id != 'all'){
            $products = Product::where('brand_id', $request->brand_id)->orderByDesc('id')->get();
        }
        if($request->status != 'all'){
            $products = Product::where('status', $request->status)->orderByDesc('id')->get();
        }
        if($request->cat_id == 'all' && $request->brand_id == 'all' && $request->status == 'all'){
            $products = Product::orderByDesc('id')->get();
        }
        $pd = '';
        $id = 1;
        $role = auth()->user()->hasRole('editor');
        foreach ($products as $product) {
            if($product->sub_category_id){$sub_category = $product->subCategory->name;}else{$sub_category = "";}
            if($product->child_category_id){$child_category = $product->childCategory->name;}else{$child_category = "";}
            if($product->home_banner == "on"){$home_banner = "checked";}else{$home_banner = "disabled";}
            if($product->home_slider == "on"){$home_slider = "checked";}else{$home_slider = "";}
            if($product->status == "on"){$status = "checked";}else{$status = "";}
            if($product->featured == "on"){$featured = "checked";}else{$featured = "";}
            $pd .= '<tr>';
            $pd .=  '<td>'. $id++ .'</td>';
            $pd .=  '<td><img src="/assets/admin/files/products/'.$product->thumbnail.'" alt="" class="me-3" style="height:40px;width:auto">'.\Illuminate\Support\Str::words($product->title, 5, "...").'</td>';
            $pd .=  '<td>'.$product->code.'</td>';
            $pd .= '<td>'.$product->purchase_price.'</td>';
            $pd .=  '<td>'.$product->category->name.'</td>';
            $pd .= '<td>'.$sub_category ?? "".'</td>';
            $pd .= '<td>'.$child_category.'</td>';
            $pd .= '<td>'. $product->stock_quantity .'</td>';
            $pd .= '<td>
                        <div class="form-check form-switch">
                            <input data-id="'.$product->id.' '.$product->home_banner.'"
                                class="form-check-input home_banner" type="checkbox" role="switch"
                                '.$home_banner.' />
                        </div>
                    </td>';
            $pd .= '<td>
                        <div class="form-check form-switch">
                            <input data-id="'.$product->id.' '.$product->home_slider.'"
                                class="form-check-input home_slider" type="checkbox" role="switch"
                                '.$home_slider.' />
                        </div>
                    </td>';
            $pd .= '<td>
                        <div class="form-check form-switch">
                            <input data-id="'.$product->id.' '.$product->featured.'"
                                class="form-check-input featured" type="checkbox" role="switch"
                                '.$featured.' />
                        </div>
                    </td>';
            $pd .=  '<td>
                        <div class="form-check form-switch">
                            <input data-id="'.$product->id.' '.$product->status.'"
                                class="form-check-input status" type="checkbox" role="switch" '.$status.' />
                        </div>
                    </td>';
            $pd .=  '<td>
                        <div class="d-flex">
                            <a href="'.route('single.product', $product->slug).'" class="btn btn-info p-2 me-2">
                                <i class="bx bx-low-vision"></i>
                            </a>

                            <a href="'.route('product.edit', $product->id).'" class="btn btn-primary p-2 me-2">
                                <i class="bx bx-edit-alt"></i>
                            </a>'.
                            (($role == false || auth()->user()->hasRole('moderator')) ? 
                            '<button type="button" class="btn btn-danger deleteProduct p-2"
                                data-id="'.$product->id.'">
                                <i class="bx bx-trash"></i>
                            </button>' : '')
                        .'</div>
                    </td>';
            $pd .= '</tr>';
        }
        return response()->json($pd);
        // return view('admin.products.products', compact('products'))->render();

    }

}

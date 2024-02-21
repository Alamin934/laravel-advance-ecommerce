<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Validation\Rule;

class BrandsController extends Controller
{
    public function __construct(){
        $this->middleware(['is_admin.auth','is_admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(8);
        return view('admin.brands.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | unique:brands',
        ]);

        $slug = Str::slug($request->name, '-');

        if($request->file('brand_logo')){
            // get & make a new file
            $file = $request->file('brand_logo');
            $extension = $file->getClientOriginalExtension();
            $new_file_name = $slug.'-'.date('d-m-Y-H-i-s').'.'.$extension;

            // resize & save to file
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(150, 70);
            $image->toPng()->save('assets/admin/files/brands/'.$new_file_name);

            // insert into database
            $brand = Brand::create([
                'name' => $request->name,
                'brand_slug' => $slug,
                'brand_logo' => $new_file_name,
            ]);
        }else{
            $brand = Brand::create([
                'name' => $request->name,
                'brand_slug' => $slug,
            ]);
        }

        // $file->move('assets/admin/files/brands/', $new_file_name);
        $notification = ['message'=>'Brand Added successfully', 'alert-type'=>'success'];
        return redirect()->route('brand.index')->with($notification);
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
        $brand = Brand::find($id);
        return view('admin.brands.edit-brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',Rule::unique('brands')->ignore($id)
        ]);

        $slug = Str::slug($request->name, '-');

        if($request->file('brand_logo')){
            $file = $request->file('brand_logo');
            $extension = $file->getClientOriginalExtension();
            $new_file_name = $slug.'-'.date('d-m-Y-H-i-s').'.'.$extension;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(150, 70);
            $image->toPng()->save('assets/admin/files/brands/'.$new_file_name);

            if($request->hasFile('brand_logo') && !empty($request->old_brand_logo)){
                unlink(public_path('assets/admin/files/brands/'.$request->old_brand_logo));
            }

            $brand = Brand::where('id', $id)->update([
                'name' => $request->name,
                'brand_logo' => $new_file_name,
            ]);
        }else{
            $brand = Brand::where('id', $id)->update([
                'name' => $request->name,
            ]);
        }

        $notification = ['message'=>'Brand Updated successfully', 'alert-type'=>'success'];
        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if(!empty($brand->brand_logo)){
            unlink(public_path('assets/admin/files/brands/'.$brand->brand_logo));
        }

        $brand->delete();
        $notification = ['message'=>'Brand Deleted successfully', 'alert-type'=>'success'];
        return redirect()->route('brand.index')->with($notification);
    }
}

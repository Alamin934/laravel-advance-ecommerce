<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.category.category', compact('categories'));
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
            'name' => 'required|unique:categories',
            'icon' => 'required|image',
            'is_home' => 'required|numeric',
        ]);

        $icon = '';
        if($request->file('icon')){
            $file = $request->file('icon');
            $new_file_name = preg_split("/[\s\-\.]+/",  Str::lower($request->name))[0].'-'.date('d-m-Y-H-i-s').'.'.$file->extension();
            $icon = $new_file_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(64, 64);
            $image->toPng()->save('assets/admin/files/category/'.$new_file_name);
        }
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'icon' => $icon,
            'is_home' => $request->is_home,
        ]);
        $notification = ['message'=>'Category Added successfully', 'alert-type'=>'success'];
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
        return response()->json($category);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'edit_cat_name' => 'required',Rule::unique('categories')->ignore($request->edit_cat_id),
            'edit_is_home' => 'required|numeric',
        ]);

        if($request->hasfile('edit_icon') && !empty($request->old_icon)){
            unlink(public_path('assets/admin/files/category/'.$request->old_icon));
        }

        $icon = '';
        if($request->file('edit_icon')){
            $file = $request->file('edit_icon');
            $new_file_name = preg_split("/[\s\-\.]+/",  Str::lower($request->edit_cat_name))[0].'-'.date('d-m-Y-H-i-s').'.'.$file->extension();
            $icon = $new_file_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->contain(64, 64);
            $image->toPng()->save('assets/admin/files/category/'.$new_file_name);
        }

        $category = Category::where('id', $request->edit_cat_id)->update([
            'name' => $request->edit_cat_name,
            'slug' => Str::slug($request->edit_cat_name, '-'),
            'icon' => $icon!='' ? $icon : $request->old_icon,
            'is_home' => $request->edit_is_home,
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

        unlink(public_path('assets/admin/files/category/'.$category->icon));


        $notification = ['message'=>'Category deleted successfully', 'alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with('sub_categories.ChildCategory')->get();
        // return $categories;
        // foreach ($categories[1]->sub_categories as $key => $sub_category) {
        //     return var_dump(empty($sub_category));
        //         // return var_dump(count($categories[0]->sub_categories) == 0);

        // }
        return view('home', compact('categories'));
    }
}

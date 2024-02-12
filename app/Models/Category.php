<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Product,SubCategory,ChildCategory};

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }

    public function child_categories(){
        return $this->hasMany(ChildCategory::class);
    }
}

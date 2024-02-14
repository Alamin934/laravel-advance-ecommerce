<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category,SubCategory,ChildCategory,Brand,Wishlist};

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
        'color' => 'array',
        'size' => 'array',
    ];

    
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
    
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function childCategory(){
        return $this->belongsTo(ChildCategory::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Product,Category,SubCategory};

class ChildCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Category;

class Product extends Model
{
    //$producto->Categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //$producto->Images
    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }
}

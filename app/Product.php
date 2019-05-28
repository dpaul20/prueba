<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Category;

class Product extends Model
{
    use softDeletes;
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

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
    //accessor
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage=$this->productImage()->where('featured',true)->first();
        if (!$featuredImage) {
           $featuredImage=$this->productImage()->first();
        }
        if ($featuredImage) {
           return $featuredImage->url;
        }
        //default
        return '/images/default/image.png';
    }
}

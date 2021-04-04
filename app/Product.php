<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Brand;
//use App\Category;

class Product extends Model
{
    use softDeletes;

    protected $fillable = ['code', 'name', 'price', 'stock', 'min_sale', 'description', 'long_description', 'category_id', 'brand_id', 'packaging_id'];

    /**
     * Undocumented $producto->Categories
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //$producto->Brands
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    //$producto->Images
    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }
    //accessor
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->productImage()->where('featured', true)->first();
        if (!$featuredImage) {
            $featuredImage = $this->productImage()->first();
        }
        if ($featuredImage) {
            return $featuredImage->url;
        }
        //default
        return '/images/default/image.png';
    }

    /**
     * Get category name
     *
     * @return string
     */
    public function getCategoryNameAttribute()
    {
        if ($this->category) {
            return $this->category->name;
        }
        return 'General';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Product;

class Category extends Model
{
	use SoftDeletes;
	/**
     * Validar los datos del formulario
     */
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
    ];
    /**
     * Mensaje a mostrar
     */
     public static $message = [
        'name.required' => 'El campo nombre es obligatorío',
        'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
        'description.required' => 'El campo descripción es obligatorío',
        'description.max' => 'El máximo de caracteres permitido es 200',
    ];
	protected $fillable=['name','description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image) {
            return '/images/categories/'.$this->image;
        }
        //else
        $featuredProduct= $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}

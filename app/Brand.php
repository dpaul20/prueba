<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
	/**
     * Validar los datos del formulario
     */
    public static $rules = [
        'name' => 'required|min:3'
    ];
    /**
     * Mensaje a mostrar
     */
     public static $message = [
        'name.required' => 'El campo nombre es obligatorío',
        'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
    ];
	protected $fillable=['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product)
    {
        # code...
        $producto = Product::find($product);
        $images = $producto->productImage;
        $imagesLeft = collect();
        $imagesRight= collect();
        foreach ($images as $key => $image) {
            if ($key%2==0) {
                $imagesLeft->push($image);
            }else{
                $imagesRight->push($image);
            }
        }
        return view('products.show', compact('producto','imagesLeft','imagesRight' ));
    }
}

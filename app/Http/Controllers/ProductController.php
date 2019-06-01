<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product)
    {
        # code...
        $product = Product::find($product);
       // view('view.name', compact($data));
    }
}

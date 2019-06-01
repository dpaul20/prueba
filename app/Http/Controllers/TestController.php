<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(9);
    	//dd($products[100]->productImage());
    	return view('welcome')->with(compact('products'));
    }
}

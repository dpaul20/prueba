<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
    	$categories = Category::has('products')->get();
    	//dd($products[100]->productImage());
    	return view('welcome')->with(compact('categories'));
    }
}

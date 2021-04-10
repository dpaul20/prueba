<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	$categories = Category::has('products')->get();
    	//dd($products[100]->productImage());
    	return view('index')->with(compact('categories'));
    }
}

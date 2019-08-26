<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
    	$xQuery = $request->buscar;
    	$products= Product::where('name' ,'like', "%$xQuery%")->paginate();
    	if ($products->count()==1) {
    		$id= $products->first()->id;
    		return redirect("products/$id");
    	}
    	return view('search.show')->with(compact('products', 'xQuery'));

    }
    public function data($value='')
    {
    	$products=Product::pluck('name');
    	return $products;
    }
}

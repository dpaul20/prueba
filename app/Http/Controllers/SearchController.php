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
    	return view('search.show')->with(compact('products', 'xQuery'));

    }
}

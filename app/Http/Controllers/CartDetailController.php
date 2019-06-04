<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\User;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	//dd($cartDetail->cart_id);
    	$user =new User();
    	$cartDetail->cart_id= $user->getCartIdAttribute();
    	$cartDetail->product_id=$request->product_id;
		$cartDetail->quantity=$request->quantity;
		$cartDetail->save();
		return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\User;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    function __construct($foo = null)
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
  
    	$cartDetail->cart_id= auth()->user()->cart->id;
    	$cartDetail->product_id=$request->product_id;
		$cartDetail->quantity=$request->quantity;
		$cartDetail->save();
		$notificacion='El producto se ha agregado al carrito de compras correctamente';
		return back()->with(compact('notificacion'));
    }
    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);
    	if ($cartDetail->cart_id == auth()->user()->cart->id) {
    		$cartDetail->delete();
    	}
    	$notificacion='El producto se ha eliminado del carrito de compras correctamente';
		
		return back()->with(compact('notificacion'));
    }
}

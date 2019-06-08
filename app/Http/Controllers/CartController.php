<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart =auth()->user()->cart;
    	$cart->status= 'Pending';
    	$cart->save();
    	$notificacion= 'Tu pedido se ha registrado correctamente. Te contactaremos via correo electrónico';
    	return back()->with(compact('notificacion'));
    }
}

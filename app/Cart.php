<?php

namespace App;

use App\CartDetail;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function details()	
    {
    	return $this->hasMany(CartDetail::class);
    }
    public function getTotalAttribute()
    {
    	$xTotal=0;
    	foreach ($this->details as $detail) {
    		$xTotal+= $detail->quantity * $detail->product->price;
    	}
    	return $xTotal;
    }
}

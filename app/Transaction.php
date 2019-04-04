<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function menu() 
    {
        return $this->belongsTo('App\Menu');
    }

    public function orders() 
    {
    	return $this->hasMany('App\Order');
    }
}

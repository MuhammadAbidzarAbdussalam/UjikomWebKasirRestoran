<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Menu extends Model
{
	// protected $primaryKey = 'id';
	use Sortable;
    public $sortable = ['id', 'menu', 'price', 'created_at', 'updated_at'];

    protected $table = 'menus';

    public function orders() 
    {
    	// return $this->belongsToMany('App\Order');
    	return $this->hasMany('App\Order');
    }

    public function transactions() 
    {
    	// return $this->belongsToMany('App\Order');
    	return $this->hasMany('App\Transaction');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use Sortable;
    public $sortable = ['id', 'id_menu', 'id_costumer', 'total', 'user', 'created_at', 'updated_at'];

    public function menu() 
    {
    	// return $this->belongsToMany('App\Menu');
        return $this->belongsTo('App\Menu');

    }

    public function costumer()
    {
    	return $this->belongsTo('App\Costumer');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function transaction() 
    {
        return $this->hasMany('App\Transaction');
    }

    public function transaction_get()
    {
        return $this->belongsTo('App\Transaction');
    }
}

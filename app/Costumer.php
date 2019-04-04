<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Costumer extends Model
{
    use Sortable;
    public $sortable = ['id', 'name', 'gender', 'phone', 'address', 'created_at', 'updated_at'];

    protected $table = 'costumers';

    public function orders() 
    {
    	return $this->hasMany('App\Order');
    }
}

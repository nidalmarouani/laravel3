<?php
use App\Order;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function order_details()
    {
        return $this->hasMany('App\Order_detail');
    }
}

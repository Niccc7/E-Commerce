<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

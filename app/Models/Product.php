<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'products';

    public function order_item(){
        return $this->hasMany(Order_item::class, 'product_id');
    }
}
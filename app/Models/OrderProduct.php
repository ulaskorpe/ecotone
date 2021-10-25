<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'order_products';
    protected $fillable = [
        'idorder_product',
        'idorder',
        'idproduct',
        'amount',
        'productcode',
        'name',
        'remarks',
        'price',
        'idvatgroup',


    ];

    public function order(){
        return $this->hasOne(Order::class,'idorder','idorder');
    }
    public function product(){
        return $this->hasOne(Product::class,'idproduct','idproduct');
    }
}

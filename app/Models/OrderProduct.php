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
        'id',
        'idorder',
        'idproduct',
        'amount',
        'productcode',
        'name',
        'remarks',
        'price',
        'idvatgroup',
        'deleted_at',
        'created_at',
        'updated_at',

    ];

    public function order(){
        return $this->hasOne(Order::class,'idorder','idorder');
    }
    public function product(){
        return $this->hasOne(Product::class,'idproduct','idproduct');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'stocks';
    protected $fillable = [
        'idproduct_stock_history',
        'idproduct',
        'idwarehouse',
        'stock',
        'reserved',
        'reservedbackorders',
        'reservedpicklists',
        'reservedallocations',
        'freestock',
       /* 'iduser',
        'old_stock',
        'stock_change',
        'new_stock',
        'reason',
        'country',
        'change_type',*/

    ];

    public function product(){
        return $this->hasOne(Product::class,'idproduct','idproduct');
    }
}

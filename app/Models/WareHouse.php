<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected  $primaryKey ='idwarehouse';
    protected $fillable = [
        'idwarehouse',
        'name',
        'accept_orders',
        'counts_for_general_stock',
        'priority',
        'active',

    ];
}

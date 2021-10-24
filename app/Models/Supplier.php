<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = [
        'idsupplier',
        'name',
        'contactname',
        'address',
        'address2',
        'zipcode',
        'city',
        'region',
        'country',
        'telephone',
        'emailaddress',
        'remarks',
        'language',
        ];
}

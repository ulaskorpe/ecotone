<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['idproduct',
        'idvatgroup','name','price','fixedstockprice','idsupplier','productcode'
        ,'productcode_supplier'
        ,'deliverytime'
        ,'description'
        ,'barcode'
        ,'type'
        ,'unlimitedstock'
        ,'weight'
        ,'length'
        ,'width'
        ,'height'
        ,'minimum_purchase_quantity'
        ,'purchase_in_quantities_of'
        ,'hs_code'
        ,'country_of_origin'
        ,'active'
        ,'idfulfilment_customer'
    ];


    public function vatgroup(){
       return $this->hasOne(VatGroup::class,'idvatgroup','idvatgroup');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class,'idsupplier','idsupplier');
    }

    public function stocks(){
       return $this->hasMany(Stock::class,'idproduct','idproduct');
    }

}

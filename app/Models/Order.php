<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'idorder',
        'idcustomer',
        'idtemplate',
        'idshippingprovider_profile',
        'orderid',
        'deliveryname',
        'deliverycontactname',
        'deliveryaddress',
        'deliveryaddress2',
        'deliveryzipcode',
        'deliverycity',
        'deliveryregion',
        'deliverycountry',
        'full_delivery_address',
        'invoicename',
        'invoicecontactname',
        'invoiceaddress',
        'invoiceaddress2',
        'invoicezipcode',
        'invoicecity',
        'invoiceregion',
        'invoicecountry',
        'full_invoice_address',
        'telephone',
        'emailaddress',
        'reference',
        'customer_remarks',
        'partialdelivery',
        'discount',
        'invoiced',
        'status',
        'idfulfilment_customer',
        'preferred_delivery_date',
        'language'

    ];

    public function order_products(){
        return $this->hasMany(OrderProduct::class,'idproduct','idproduct');
    }
}

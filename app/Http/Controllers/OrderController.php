<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Picqer\Api\Client;

class OrderController extends Controller
{
    public function getOrders (){


        $fields  = [
            "idorder",
            "idcustomer",
            "idtemplate",
            "idshippingprovider_profile",
            "orderid",
            "deliveryname",
            "deliverycontactname",
            "deliveryaddress",
            "deliveryaddress2",
            "deliveryzipcode",
            "deliverycity",
            "deliveryregion",
            "deliverycountry",
            "full_delivery_address",
            "invoicename",
            "invoicecontactname",
            "invoiceaddress",
            "invoiceaddress2",
            "invoicezipcode",
            "invoicecity",
            "invoiceregion",
            "invoicecountry",
            "full_invoice_address",
            "telephone",
            "emailaddress",
            "reference",
            "customer_remarks",
            "partialdelivery",
            "discount",
            "invoiced",
            "status",
            "idfulfilment_customer",
            "preferred_delivery_date",
            "language"

        ];
        $fields_op  = [ 'idorder_product',
            'idproduct',
            'amount',
            'productcode',
            'name',
            'remarks',
            'price',
            'idvatgroup',];



//        foreach ($fields as $field){
//            echo "'".$field."',"."<br>";
//        }
//
//        die();
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
        $orders= $apiClient->getOrders()['data'];


        Order::truncate();
        OrderProduct::truncate();


        foreach ($orders as $order){



            $newOrder = new Order();
            foreach ($fields as $field){
                if(!empty($order[$field])){
                    $newOrder->$field= $order[$field];
                }
            }
            $newOrder->save();

            foreach ($order['products'] as $orderProduct) {
                $op = new OrderProduct();
                $op->idorder = $newOrder['idorder'];
                foreach ($fields_op as $f){
                    $op->$f = $orderProduct[$f];
                }
                //var_dump($orderProduct);
                $op->save();
            }



        }
///return $fields;


        return view('orders_list',['orders'=>Order::with('order_products')->get(),'fields'=>$fields,'fields_op'=>$fields_op]);


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Picqer\Api\Client;

class OrderController extends Controller
{
    public function getOrders (){


        $user= new OrderProduct();

        $table = $user->getTable();

        $fields  = \Schema::getColumnListing($table);

        foreach ($fields as $field){
            echo "'".$field."',"."<br>";
        }

        die();
        $user= new Order();

        $table = $user->getTable();

        $fields  = \Schema::getColumnListing($table);



//        foreach ($fields as $field){
//            echo "'".$field."',"."<br>";
//        }
//
//        die();
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
        $orders= $apiClient->getOrders()['data'];




//
        //       return $warehouses;
        Order::truncate();


        foreach ($orders as $warehouse){


            $newWarehouse = new WareHouse();
            foreach ($fields as $field){
                if(!empty($warehouse[$field])){
                    $newWarehouse->$field= $warehouse[$field];
                }
            }
            $newWarehouse->save();
            //  $stocks = $apiClient->getProductStock($newProduct['idproduct']);



        }


        return view('warehouses_list',['warehouses'=>WareHouse::all(),'fields'=>$fields]);


    }
}

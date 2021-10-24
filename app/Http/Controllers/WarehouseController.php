<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Http\Request;
use Picqer\Api\Client;

class WarehouseController extends Controller
{
    public function getWarehouses (){
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
        $warehouses= $apiClient->getWarehouses()['data'];



        $fields =[
            'idwarehouse',
            'name',
            'accept_orders',
            'counts_for_general_stock',
            'priority',
            'active',

        ];
//
     //       return $warehouses;
        WareHouse::truncate();

        foreach ($warehouses as $warehouse){


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

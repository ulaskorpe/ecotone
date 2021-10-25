<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Picqer\Api\Client;

class SupplierController extends Controller
{
    public function getSuppliers (){
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
        $suppliers= $apiClient->getSuppliers()['data'];



        $fields =  [
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

        //    return $suppliers;
        Supplier::truncate();

        foreach ($suppliers as $supplier){


            $newsupplier = new supplier();
            foreach ($fields as $field){
                if(!empty($supplier[$field])){
                    $newsupplier->$field	 = $supplier[$field];
                }
            }
            $newsupplier->save();
            //  $stocks = $apiClient->getsupplierStock($newsupplier['idsupplier']);



        }


       return view('supplier_list',['suppliers'=>Supplier::all(),'fields'=>$fields]);


    }
}

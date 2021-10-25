<?php

namespace App\Http\Controllers;

use App\Models\VatGroup;
use Illuminate\Http\Request;
use Picqer\Api\Client;

class VatGroupController extends Controller
{
    public function getVatgroups (){
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
        $vatgroups= $apiClient->getVatgroups()['data'];



        $fields =  ['idvatgroup','name','percentage'];

        //    return $vatgroups;
        VatGroup::truncate();

        foreach ($vatgroups as $vatgroup){


            $newvatgroup = new VatGroup();
            foreach ($fields as $field){
                if(!empty($vatgroup[$field])){
                    $newvatgroup->$field	 = $vatgroup[$field];
                }
            }
            $newvatgroup->save();
            //  $stocks = $apiClient->getvatgroupStock($newvatgroup['idvatgroup']);



        }


        return view('vatgroup_list',['vatgroups'=>VatGroup::all(),'fields'=>$fields]);


    }
}

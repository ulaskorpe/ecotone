<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer\Api\Client;
use Picqer\Api\PicqerWebhook;


class HomeController extends Controller
{




    public function orders(){

    }

   public function index(){

       $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
       $apiClient->enableRetryOnRateLimitHit();
       $apiClient->setUseragent('ECOTONE');
       $orders = $apiClient->getOrders()['data'];
   //     Product::truncate();
       $products= $apiClient->getProducts()['data'];

       return $products;
        foreach ($products as $product){
            $newProduct = new Product();
            $newProduct->idproduct = $product['idproduct'];
            $newProduct->save();
        }

       dd($products);

   //var_dump($orders);

        return view('index',['orders'=>$apiClient->getOrders()['data']]);

      // print_r(array_keys($orders));
  //     var_dump($orders['data'][0]);




   }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Picqer\Api\Client;
use Picqer\Api\PicqerWebhook;

class ProductController extends Controller
{
    public function products(){

        $products = Product::all();

        return view('product_list',['products'=>$products]);


    }

    public function getProducts (){
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
        $products= $apiClient->getProducts()['data'];

      //return  $products;

         $fields = ['idproduct',
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

     //    return $products;
        Product::truncate();
        Stock::truncate();
        foreach ($products as $product){


            $newProduct = new Product();
            foreach ($fields as $field){
                if(!empty($product[$field])){
                    $newProduct->$field	 = $product[$field];
                }
            }
            $newProduct->save();
          //  $stocks = $apiClient->getProductStock($newProduct['idproduct']);

            if(!empty($product['stock'])){
                $stock = new Stock();
                $stock->idproduct =$newProduct['idproduct'];
                $stock->idwarehouse =$product['stock'][0]['idwarehouse'];
                $stock->stock =$product['stock'][0]['stock'];
                $stock->reserved =$product['stock'][0]['reserved'];
                $stock->reservedbackorders =$product['stock'][0]['reservedbackorders'];
                $stock->reservedpicklists =$product['stock'][0]['reservedpicklists'];
                $stock->reservedallocations =$product['stock'][0]['reservedallocations'];
                $stock->freestock =$product['stock'][0]['freestock'];
                $stock->save();
//var_dump($product['stock'][0]['idwarehouse'] );
//echo "<hr>";
            }

        }


return view('product_list',['products'=>Product::all(),'fields'=>$fields]);


    }

}

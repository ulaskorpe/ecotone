<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\VatGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Picqer\Api\Client;
use Picqer\Api\PicqerWebhook;

class ProductController extends Controller
{
    private function checkUnique($field,$table,$value){
        $ch = DB::table($table)
            ->select($field)
            ->whereRaw($field.'= ?',[$value])->first();
        return (!empty($ch->id)) ? 1:0;
    }


    private function randomPassword($len = 16,$alphabet=0) {
        if($alphabet==1){
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        }else{
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890+-%/*#$%&()!@';
        }

        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $len; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }



    public function products(){

        $products = Product::all();

        return view('product_list',['products'=>$products,'fields'=>   $fields = ['idproduct',
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
        ]]);


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

    public function createProduct(){

        $idproduct = 0;
        $ch = true;
        while( $ch){
            $idproduct = rand(10000000,99999999);
            $ch = ($this->checkUnique('idproduct','products',$idproduct))? true : false;
        }

        $productcode ="";

        $ch = true;
        while( $ch){
            $productcode = strtoupper($this->randomPassword(8,1));
            $ch = ($this->checkUnique('productcode','products',$productcode))? true : false;
        }



        return view('create_product',['idproduct'=>$idproduct,'productcode'=>$productcode,
            'vatgroups'=>VatGroup::all(),'suppliers'=>Supplier::all(),
            'required_array'=>['name','price','fixedstockprice'],
            'optional_array'=>[
                'productcode_supplier'
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
            ]
            ]);
    }

    public function updateProduct($idproduct){


        return view('update_product',['product'=>Product::where('idproduct','=',$idproduct)->first(),
            'vatgroups'=>VatGroup::all(),'suppliers'=>Supplier::all(),
            'required_array'=>['name','price','fixedstockprice'],
            'optional_array'=>[
                'productcode_supplier'
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
            ]
            ]);
    }

    public function createProductPost(Request $request){

        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [  ];
            $this->validate($request, $rules, $messages);
              DB::transaction(function () use ($request ) {

                $fields_bool =['active','unlimitedstock'];
                $fields_string =['name','productcode','productcode_supplier','description','barcode','type' ,'hs_code','country_of_origin'];
                $fields_int =  ['idproduct',
                    'idvatgroup','price','fixedstockprice','idsupplier'
                    ,'deliverytime'
                    ,'weight'
                    ,'length'
                    ,'width'
                    ,'height'
                    ,'minimum_purchase_quantity'
                    ,'purchase_in_quantities_of'
                    ,'active'
                    ,'idfulfilment_customer'
                ];


                $product = new Product();
                foreach ($fields_int as $field){
                    $product->$field = (!empty($request[$field])) ? $request[$field]:0;
                }
                foreach ($fields_string as $field){
                    $product->$field = (!empty($request[$field])) ? $request[$field]:null;
                }
                foreach ($fields_bool as $field){
                    $product->$field = (!empty($request[$field])) ? 1:0;
                }
                // ,'unlimitedstock'
                $product->save();

                  $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
                  $apiClient->enableRetryOnRateLimitHit();
                  $apiClient->setUseragent('ECOTONE');
                   $apiClient->addProduct($product);
            });
            return redirect('/listproducts');
        }
    }

    public function updateProductPost(Request $request){


        if ($request->isMethod('post')) {


                $fields_bool =['active','unlimitedstock'];
                $fields_string =['name','productcode_supplier','description','barcode','type' ,'hs_code','country_of_origin'];
                $fields_int =  [
                    'idvatgroup','price','fixedstockprice','idsupplier'
                    ,'deliverytime'
                    ,'weight'
                    ,'length'
                    ,'width'
                    ,'height'
                    ,'minimum_purchase_quantity'
                    ,'purchase_in_quantities_of'
                    ,'active'
                    ,'idfulfilment_customer'
                ];

            $product = Product::where('idproduct','=',$request['idproduct'])->first();
            $data = array();
            foreach ($fields_int as $field){
                $product->$field = (!empty($request[$field])) ? $request[$field]:0;
                $data[$field] = (!empty($request[$field])) ? $request[$field]:0;

            }
            foreach ($fields_string as $field){
                $product->$field = (!empty($request[$field])) ? $request[$field]:null;
                $data[$field] = (!empty($request[$field])) ? $request[$field]:null;
            }
            foreach ($fields_bool as $field){
                $product->$field = (!empty($request[$field])) ? 1:0;
                $data[$field] = (!empty($request[$field])) ? 1:0;
            }
            // ,'unlimitedstock'
            $product->save();


                $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
                $apiClient->enableRetryOnRateLimitHit();
                $apiClient->setUseragent('ECOTONE');

                $product_server = $apiClient->getProductByProductcode($product['productcode']);



           $apiClient->updateProduct($product_server['data']['idproduct'], $data);
           //    return $product_server;

            return redirect('/listproducts');

        }
    }

    public function deleteProduct($idproduct){
        Product::where('idproduct','=',$idproduct)->delete();
        return "Product Deleted";
    }

}

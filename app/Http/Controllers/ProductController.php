<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\LocationType;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\VatGroup;
use App\Models\WareHouse;
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


            if(!empty($product['stock'])){
           // echo $newProduct['idproduct']."<br>";
                foreach ($product['stock'] as $item){
                    $stock = new Stock();
                    $stock->idproduct =$newProduct['idproduct'];
                    $stock->idwarehouse =$item['idwarehouse'];
                    $stock->stock =$item['stock'];
                    $stock->reserved =$item['reserved'];
                    $stock->reservedbackorders =$item['reservedbackorders'];
                    $stock->reservedpicklists =$item['reservedpicklists'];
                    $stock->reservedallocations =$item['reservedallocations'];
                    $stock->freestock =$item['freestock'];
                    $stock->save();
                }

//var_dump($product['stock'][0]['idwarehouse'] );

            }

        }///foreach products

        $locations =  $apiClient->getLocations()['data'];
        Location::truncate();
        LocationType::truncate();
        foreach ($locations as $location){

            $lo=new Location();
            $lo->idlocation = $location['idlocation'];
            $lo->idwarehouse = $location['idwarehouse'];
            $lo->name = $location['name'];
            $lo->parent_idlocation = (!empty($location['parent_idlocation'])) ? $location['parent_idlocation'] :0 ;

            $lt = LocationType::find($location['location_type']['idlocation_type']);
            if(empty($lt['idlocation_type'])){
                $lt = new LocationType();
                $lt->idlocation_type = $location['location_type']['idlocation_type'];
                $lt->name = $location['location_type']['name'];
                $lt->default = $location['location_type']['default'];
                $lt->color = $location['location_type']['color'];
                $lt->save();

            }
            // $lo->idlocation_type=$lt['idlocation_type'];
            $lo->idlocation_type=$location['location_type']['idlocation_type'];
            $lo->save();



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
                //$apiClient->deletepr
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
    public function deleteStock($idstock){
        Stock::where('idproduct_stock_history','=',$idstock)->delete();
        return "Stock Deleted";
    }

    public function listStocks($idproduct){

        return view('product_stocks',['stocks'=>Stock::where('idproduct','=',$idproduct)->orderBy('created_at','DESC')->get(),
            'product'=>Product::find($idproduct)

            ]);
    }

    public function createStock($idproduct){

        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');


         return view('create_stock',['idproduct'=>$idproduct,'warehouses'=>WareHouse::all(),'product'=>Product::find($idproduct)


         ]);


    }

    public function updateStock($idproduct_stock_history){


    $stock = Stock::find($idproduct_stock_history);

         return view('update_stock',['idproduct'=>$stock['idproduct'],'warehouses'=>WareHouse::all(),
             'stock'=>$stock,
             'product'=>Product::find($stock['idproduct'])


         ]);


    }

    public function createStockPost(Request $request){


        $stock=new Stock();
        $stock->idproduct=$request['idproduct'];
        $stock->idwarehouse=$request['idwarehouse'];
        $stock->stock=$request['stock'];
        $stock->reserved=$request['reserved'];
        $stock->reservedbackorders=$request['reservedbackorders'];
        $stock->reservedpicklists=$request['reservedpicklists'];
        $stock->reservedallocations=$request['reservedallocations'];
        $stock->freestock=$request['freestock'];
        $stock->save();

     $product = Product::with('stocks')->find($request['idproduct']);
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
       // $apiClient->addProduct($product);
        ///$apiClient->
        return redirect('/listproducts');
    }

    public function updateStockPost(Request $request){


        $stock=Stock::find($request['idproduct_stock_history']);
        //$stock->idproduct=$request['idproduct'];
        $stock->idwarehouse=$request['idwarehouse'];
        $stock->stock=$request['stock'];
        $stock->reserved=$request['reserved'];
        $stock->reservedbackorders=$request['reservedbackorders'];
        $stock->reservedpicklists=$request['reservedpicklists'];
        $stock->reservedallocations=$request['reservedallocations'];
        $stock->freestock=$request['freestock'];
        $stock->save();

     $product = Product::with('stocks')->find($request['idproduct']);
        $apiClient = new Client('fairweb','I2Tc124Kp0qBvI0glLMUi6souHsMimyh8C2fOk8hk59Rf3qg');
        $apiClient->enableRetryOnRateLimitHit();
        $apiClient->setUseragent('ECOTONE');
       // $apiClient->addProduct($product);
        ///$apiClient->
        return redirect('/listproducts');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer\Api\Client;
use Picqer\Api\PicqerWebhook;


class HomeController extends Controller
{





   public function index(){





   //var_dump($orders);

       return view('index',[]);

      // print_r(array_keys($orders));
  //     var_dump($orders['data'][0]);




   }
}

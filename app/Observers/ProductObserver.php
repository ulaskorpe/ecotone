<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Stock;

class ProductObserver
{
    public function deleted(Product $product)
    {
        Stock::where('idproduct','=',$product['idproduct'])->delete();
    }
}

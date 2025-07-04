<?php

namespace App\Http\Controllers\Modules\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    public function index()
    {
        $data['products']           = products::paginate(10);
        $data['totalProducts']      = products::countProducts();
        $data['totalAmount']        = products::sumProductAmount();

        return view('modules.products.product-list.product-list', $data);
    }

    public function addProducts()
    {

        return view('modules.products.product-list.add-products');
    }
}

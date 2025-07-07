<?php

namespace App\Http\Controllers\Modules\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersContoller extends Controller
{
    public function index()
    {

        return view('modules.customers.customer-list');
    }
}

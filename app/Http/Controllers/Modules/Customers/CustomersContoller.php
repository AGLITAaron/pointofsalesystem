<?php

namespace App\Http\Controllers\Modules\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance\Gender;
use App\Models\Customers\Customers;

class CustomersContoller extends Controller
{
    public function index()
    {
        $data['gender'] = Gender::get();

        $data['customers'] = Customers::select('CustomerID', 'CustomerNumber', 'CustomerName', 'CompleteAddress')
            ->paginate(10);


        return view('modules.customers.customer-list', $data);
    }

    public function addCustomer(Request $request)
    {

        $customer_id            = null;
        $customer_name          =  $request->{'customer-name'};
        $customer_gender        =  $request->{'gender'};
        $customer_address       =  $request->{'permanent-address'};
        $province               =  $request->{'province'};
        $municipality           =  $request->{'municipality'};
        $barangay               = $request->{'barangay'};
        $action                 = 'Create';


        $lastname                = Customers::getLastName($customer_name);
        $seriesNumber            = Customers::generateSeriesNumber($lastname);

        $create_customer = Customers::doRegisterCustomer($customer_id, $seriesNumber, $customer_name, $customer_gender, $customer_address, $province, $municipality, $barangay, $action);

        return response()->json($create_customer);
    }

    public function editCustomer(Request $request)
    {
        $data['gender'] = Gender::get();

        $data['customers'] = Customers::where('CustomerID', $request->id)
            ->first();

        return view('modules.customers.modals.edit-customer-modal', $data);
    }
}

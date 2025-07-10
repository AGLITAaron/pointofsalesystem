<?php

namespace App\Http\Controllers\Modules\Maintenance\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance\Price;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        $data['prices'] = Price::paginate(10);

        return view('modules.maintenance.price.price', $data);
    }

    public function addPrice(Request $request)
    {
        $price_id       = null;
        $weight         = $request->{'weight'};
        $price          = $request->{'price'};
        $action         = 'Create';


        $create_price = Price::doPriceList($price_id, $weight, $price, $action);

        return response()->json($create_price);
    }

    public function editPrice(Request $request)
    {
        $data['price'] = Price::where('PriceID', $request->id)
            ->first();

        return view('modules.maintenance.price.modals.edit-price-modal', $data);
    }


    public function editPriceProc(Request $request)
    {
        $price_id       = $request->{'price-id'};
        $weight         = $request->{'weight'};
        $price          = $request->{'price'};
        $action         = 'Update';


        $edit_price = Price::doPriceList($price_id, $weight, $price, $action);

        return response()->json($edit_price);
    }

    public function deletePrice(Request $request)
    {
        $data['price'] = Price::where('PriceID', $request->id)
            ->first();

        return view('modules.maintenance.price.modals.delete-price-modal', $data);
    }


    public function deletePriceProc(Request $request)
    {
        $price_id       = $request->{'price-id'};
        $weight         = null;
        $price          = null;
        $action         = 'Delete';


        $delete_price = Price::doPriceList($price_id, $weight, $price, $action);

        return response()->json($delete_price);
    }
}

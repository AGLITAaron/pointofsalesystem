<?php

namespace App\Http\Controllers\Modules\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;

class ProductBrandController extends Controller
{
    public function index()
    {
        $data['brand'] = ProductBrand::paginate(10);

        return view('modules.products.product-brand.product-brand', $data);
    }

    public function addProductBrand(Request $request)
    {
        $brand_id       = null;
        $brand          = $request->{'new-product-brand'};
        $action         = 'Create';

        $create_brand  = ProductBrand::doProductBrand($brand_id, $brand, $action);

        return response()->json($create_brand);
    }

    public function editProductBrand(Request $request)
    {

        $data['brand'] = ProductBrand::where('BrandID', $request->id)
            ->first();

        return view('modules.products.modals.product-brand.edit-product-brand-modal', $data);
    }

    public function editProductBrandProc(Request $request)
    {

        $brand_id       = $request->{'brand-id'};
        $brand          = $request->{'edit-product-brand'};
        $action         = 'Update';

        $edit_brand  = ProductBrand::doProductBrand($brand_id, $brand, $action);

        return response()->json($edit_brand);
    }

    public function deleteProductBrand(Request $request)
    {

        $data['brand'] = ProductBrand::where('BrandID', $request->id)
            ->first();

        return view('modules.products.modals.product-brand.delete-product-brand-modal', $data);
    }

    public function deleteProductBrandProc(Request $request)
    {

        $brand_id       = $request->{'brand-id'};
        $brand          = null;
        $action         = 'Delete';

        $delete_brand  = ProductBrand::doProductBrand($brand_id, $brand, $action);

        return response()->json($delete_brand);
    }
}

<?php

namespace App\Http\Controllers\Modules\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $data['category'] = ProductCategory::paginate(10);

        return view('modules.products.product-category.product-category', $data);
    }

    public function addProductCategory(Request $request)
    {
        $category_id = null;
        $category = $request->{'new-product-category'};
        $action = 'Create';


        $create_product_category = ProductCategory::doProductCategory($category_id, $category, $action);

        return response()->json($create_product_category);
    }

    public function editProductCategory(Request $request)
    {

        $data['category'] = ProductCategory::where('CategoryID', $request->id)
            ->first();
        return view('modules.products.modals.product-category.edit-product-category-modal', $data);
    }

    public function editProductCategoryProc(Request $request)
    {
        $category_id = $request->{'category-id'};
        $category = $request->{'edit-product-category'};
        $action = 'Update';


        $edit_product_category = ProductCategory::doProductCategory($category_id, $category, $action);

        return response()->json($edit_product_category);
    }

    public function deleteProductCategory(Request $request)
    {

        $data['category'] = ProductCategory::where('CategoryID', $request->id)
            ->first();

        return view('modules.products.modals.product-category.delete-product-category-modal', $data);
    }

    public function deleteProductCategoryProc(Request $request)
    {
        $category_id = $request->{'category-id'};
        $category = null;
        $action = 'Delete';


        $delete_product_category = ProductCategory::doProductCategory($category_id, $category, $action);

        return response()->json($delete_product_category);
    }
}

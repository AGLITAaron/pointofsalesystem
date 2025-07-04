<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_category';
    protected $primaryKey = 'CategoryID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'Category',
        'CreatedBy',
    ];

    public $incrementing = true;



    public function doProductCategory($category_id, $category, $action)
    {

        $product_category = DB::select("CALL sp_product_category(?,?,?)", [
            $category_id,
            $category,
            $action
        ]);

        foreach ($product_category as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }
}

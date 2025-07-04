<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductBrand extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_brand';
    protected $primaryKey = 'BrandID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'Brand',
        'CreatedBy',
    ];

    public $incrementing = true;

    public function doProductBrand($brand_id, $brand, $action)
    {

        $product_brand = DB::select("CALL sp_product_brand(?,?,?)", [
            $brand_id,
            $brand,
            $action
        ]);

        foreach ($product_brand as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }
}

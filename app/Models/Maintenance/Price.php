<?php

namespace App\Models\Maintenance;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;


    protected $table = 'tblprice';
    protected $primaryKey = 'PriceID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'Weight',
        'Price'
    ];

    public $incrementing = true;


    public function doPriceList($price_id, $weight, $price, $action)
    {

        $price = DB::select("CALL sp_price(?,?,?,?)", [
            $price_id,
            $weight,
            $price,
            $action
        ]);

        foreach ($price as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }
}

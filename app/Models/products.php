<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'tbl_products';
    protected $primaryKey = 'ProductID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'ProductCode',
        'ProductName',
        'Quantity',
        'Amount',
        'ProductDecription',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    public $incrementing = true;

    public function countProducts()
    {
        $total_product = products::count();

        return $total_product;
    }

    public function sumProductAmount()
    {
        $totalAmount = products::selectRaw("SUM(Amount) AS TotalAmount")->first();
        return $totalAmount;
    }
}

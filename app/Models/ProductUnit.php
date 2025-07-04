<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_unit';
    protected $primaryKey = 'ProductID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'UnitID',
        'UnitName',
        'UnitShortName',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    public $incrementing = true;
}

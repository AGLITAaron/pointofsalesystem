<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'tblcustomers';
    protected $primaryKey = 'CustomerID';
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'CustomerNumber',
        'CustomerName',
        'ContactNumber',
        'GenderID',
        'Province',
        'Municpality',
        'Barangay',
        'CompleteAdddress',
        'RegistrationDate',
        'BranchRegistered',
        'CreatedBy'
    ];
}

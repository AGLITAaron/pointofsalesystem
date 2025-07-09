<?php

namespace App\Models\Employees;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $table = 'tblemployees';
    protected $primaryKey = 'EmployeeID';
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'UserID',
        'ContactNumber',
        'GenderID',
        'SalaryID',
        'Province',
        'Municpality',
        'Barangay',
        'CompleteAdddress',
        'Datehired'
    ];

    public $incrementing = true;


    public function doEmployee()
    {

        return true;
    }
}

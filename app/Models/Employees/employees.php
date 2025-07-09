<?php

namespace App\Models\Employees;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function Users()
    {
        return $this->hasOne(\App\Models\User::class, 'UserID', 'UserID');
    }

    public function Gender()
    {
        return $this->hasOne(\App\Models\Maintenance\Gender::class, 'GenderID', 'GenderID');
    }

    public function Salary()
    {
        return $this->hasOne(\App\Models\Maintenance\Salary::class, 'SalaryID', 'SalaryID');
    }


    public function doEmployee($employee_id, $userid, $contact_number, $gender, $salary, $province, $municipality, $barangay, $complete_address, $action)
    {
        $employees = DB::select("CALL sp_employees(?,?,?,?,?,?,?,?,?,?)", [
            $employee_id,
            $userid,
            $contact_number,
            $gender,
            $salary,
            $province,
            $municipality,
            $barangay,
            $complete_address,
            $action
        ]);

        foreach ($employees as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }
}

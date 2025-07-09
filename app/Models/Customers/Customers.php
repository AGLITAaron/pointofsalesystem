<?php

namespace App\Models\Customers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function doRegisterCustomer($customer_id, $seriesNumber, $customer_name, $customer_gender, $customer_address, $province, $municipality, $barangay, $action)
    {

        $customers = DB::select("CALL sp_customers(?,?,?,?,?,?,?,?,?)", [
            $customer_id,
            $seriesNumber,
            $customer_name,
            $customer_gender,
            $customer_address,
            $province,
            $municipality,
            $barangay,
            $action
        ]);

        foreach ($customers as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }

    function getLastName($fullName)
    {
        $parts = explode(' ', trim($fullName));
        return end($parts); // returns the last word as the last name
    }

    public static function generateSeriesNumber($lastName)
    {
        $prefix = strtoupper(Str::limit($lastName, 3, '')); // First 3 letters
        $date = now()->format('Ymd');

        $baseSeries = $prefix . $date;

        // Count existing records that start with the same baseSeries
        $latest = DB::table('tblcustomers')
            ->where('CustomerNumber', 'like', $baseSeries . '%')
            ->orderBy('CustomerNumber', 'desc')
            ->value('CustomerNumber');

        if ($latest) {
            $lastIncrement = (int)substr($latest, -4);
            $nextIncrement = str_pad($lastIncrement + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextIncrement = '0001';
        }

        return $baseSeries . $nextIncrement;
    }
}

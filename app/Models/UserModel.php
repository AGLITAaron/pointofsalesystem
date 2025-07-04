<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $table = 'tbluser_accounts';
    protected $primaryKey = 'UserID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'UserID',
        'Username',
        'Password',
        'FName',
        'MName',
        'LName',
        'Birthday',
        'PassowrdExpiration',
        'AccountStatus'
    ];

    public $incrementing = true;


    public function userAccounts($userID, $username, $password, $new_password, $fname, $mname, $lname, $birthday, $cellphone, $action)
    {
        $register_user = DB::select("CALL sp_accounts(?,?,?,?,?,?,?,?,?,?)", [
            $userID,
            $username,
            $password,
            $new_password,
            $fname,
            $mname,
            $lname,
            $birthday,
            $cellphone,
            $action
        ]);

        foreach ($register_user as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }
}

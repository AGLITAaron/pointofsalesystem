<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRole extends Model
{
    use HasFactory;


    protected $table = 'tbl_user_role';
    protected $primaryKey = 'RoleID';
    protected $keyType = 'int';
    public $timestamps = false; // if no created_at/updated_at

    protected $fillable = [
        'Role',
        'created_by',
        'updated_by',
    ];

    public $incrementing = true;

    public function UserRole($role_id, $role, $action)
    {

        $user_role = DB::select("CALL sp_role(?,?,?)", [
            $role_id,
            $role,
            $action
        ]);

        foreach ($user_role as $resultSet) {
            if (isset($resultSet->SuccessMessage)) {
                return ['status' => 'success', 'message' => $resultSet->SuccessMessage];
            } elseif (isset($resultSet->ErrorMessage)) {
                return ['status' => 'warning', 'message' => $resultSet->ErrorMessage];
            }
        }
    }
}

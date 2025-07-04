<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
}

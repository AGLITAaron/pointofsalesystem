<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContactNumber extends Model
{
    use HasFactory;

    protected $table = 'tbluser_contact_numbers';
    protected $primaryKey = 'ContactID';
    protected $keyType = 'int';
    protected $fillable = [
        'ContactID',
        'UserID',
        'CellPhoneNumber'
    ];

    public $incrementing = true;
}

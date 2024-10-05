<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    // ระบุชื่อตารางที่ถูกต้อง
    protected $table = 'users_information';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'user_id',
    ];
}
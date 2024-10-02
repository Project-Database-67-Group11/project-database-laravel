<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_information_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'user_id',
    ];
}

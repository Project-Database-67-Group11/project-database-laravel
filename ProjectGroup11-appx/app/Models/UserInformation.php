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
    // UserInformation model (app/Models/UserInformation.php)

    protected $primaryKey = 'user_information_id'; // If the primary key is not 'id'
    public $incrementing = true;  // Make sure it's set to auto-increment

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
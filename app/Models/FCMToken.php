<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FCMToken extends Model {
    use HasFactory;
    protected $table = 'fcm_tokens'; // ตรวจสอบว่าชื่อตรงกับฐานข้อมูล
    protected $fillable = ['user_id', 'device_token'];
}

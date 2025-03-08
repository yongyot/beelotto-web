<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LottoResult extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
    ];

    protected $casts = [
        'three_digit' => 'array', // 🟢 ให้ Laravel แปลง JSON เป็น Array
    ];
}

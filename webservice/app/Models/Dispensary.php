<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispensary extends Model
{
    use HasFactory;

    // กำหนดให้ฟิลด์ที่ต้องการทำการ mass assignment
    protected $fillable = [
        'name', // เพิ่ม 'name' ที่นี่
        'benefit', // ฟิลด์อื่นๆ ที่ต้องการ
        'price',   // ฟิลด์อื่นๆ ที่ต้องการ
        // เพิ่มฟิลด์อื่นๆ ตามที่ต้องการ
    ];
}

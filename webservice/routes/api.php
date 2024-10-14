<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DispensaryController;
use App\Http\Controllers\AuthController;

// เส้นทางสำหรับการเข้าสู่ระบบ (ไม่ต้องใช้การยืนยันตัวตน)
Route::post('login', [AuthController::class, 'login']);

// กลุ่มเส้นทางที่ต้องการการยืนยันตัวตน
Route::group(['middleware' => ['auth:sanctum']], function () {
    // ใช้ resource สำหรับ dispensary เพื่อสร้างเส้นทาง CRUD ทั้งหมด
    Route::resource('dispensary', DispensaryController::class);
    
    // เส้นทางสำหรับการออกจากระบบ
    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::put('/dispensaries/{id}', [DispensaryController::class, 'update']);
    // เส้นทางสำหรับดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

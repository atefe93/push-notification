<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PushController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



//Route::get('/generate-vapid-keys', [NotificationController::class, 'generateVapidKeys']);
//Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('sendNotification');



Route::get('/admin', [PushController::class,'index']);
Route::post('/admin/sendpush/{push}', [PushController::class,'send']);

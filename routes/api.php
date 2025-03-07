<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SparePartsController;
use App\Http\Controllers\WorkshopRatingController;
use App\Http\Controllers\WorkshopsController;
use App\Http\Controllers\serviceReminderController;
use App\Http\Controllers\workshopReportsController;
use App\Http\Controllers\chatsController;
use App\Http\Controllers\documentReminderController;
use App\Models\SpareParts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('workshops', WorkshopsController::class);
Route::apiResource('services', ServicesController::class);
Route::apiResource('spareparts', SparePartsController::class);
Route::apiResource('workshopratings', WorkshopRatingController::class);
Route::apiResource('servicereminders', serviceReminderController::class);
Route::apiResource('workshopreports', workshopReportsController::class);
Route::apiResource('documentreminders', documentReminderController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('chats', [chatsController::class, 'index']);
    
    Route::get('chats/{chatId}/messages', [chatsController::class, 'show']);
    
    Route::post('chats', [chatsController::class, 'store']);
    
    Route::post('chats/{chatId}/messages', [chatsController::class, 'sendMessage']);
    
    Route::delete('chats/{chatId}', [chatsController::class, 'destroy']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');

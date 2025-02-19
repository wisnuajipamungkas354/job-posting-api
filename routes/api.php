<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Company\CompanyJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/register-company', [AuthController::class, 'registerCompany']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::resource('company-job', CompanyJobController::class)->except('create', 'edit')->middleware('auth:sanctum');
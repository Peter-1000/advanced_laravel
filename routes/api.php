<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\ThirdPartyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('products/export-excel', [ProductController::class, 'exportExcel']);
Route::post('products/import-excel', [ProductController::class, 'importExcel']);

Route::get('third-party-data', [ThirdPartyController::class, 'getData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class)->middleware(['auth:sanctum', 'checkAdmin:Peter']);
Route::post('send-email', [EmailController::class, 'sendEmail'])->middleware(['auth:sanctum']);

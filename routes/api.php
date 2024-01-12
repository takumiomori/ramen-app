<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\GuestController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('guest', [GuestController::class,'index']);
Route::post('guestadd', [GuestController::class,'create']);
Route::get('guestdel', [GuestController::class,'delete']);
Route::post('guestdel', [GuestController::class,'remove']);
Route::get('guestedit', [GuestController::class,'edit']);
Route::post('guestedit', [GuestController::class,'update']);
Route::get('guestpage', [GuestController::class,'show']);
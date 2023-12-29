<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest/index',[GuestController::class, 'index']);
Route::get('/guest/add',[GuestController::class, 'add']);
Route::post('/guest/add',[GuestController::class, 'create']);
Route::get('/guest/del',[GuestController::class, 'delete']);
Route::post('/guest/del',[GuestController::class, 'remove']);






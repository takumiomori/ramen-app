<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopcategoryController;
use App\Http\Controllers\PlaceController;


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

Route::get('/place/index',[PlaceController::class, 'index']);
Route::post('/place/index',[PlaceController::class, 'create']);
Route::get('/place/del',[PlaceController::class, 'delete']);
Route::post('/place/del',[PlaceController::class, 'remove']);





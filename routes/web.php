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

Route::get('/shopcategory/index',[ShopcategoryController::class, 'index']);
Route::post('/shopcategory/index',[ShopcategoryController::class, 'create']);
Route::get('/shopcategory/del',[ShopcategoryController::class, 'delete']);
Route::post('/shopcategory/del',[ShopcategoryController::class, 'remove']);

Route::get('/favorite/index',[FavoriteController::class, 'index']);
Route::post('/shop/?',[FavoriteController::class, 'create']);
Route::get('/favorite/del',[FavoriteController::class, 'delete']);
Route::post('/favorite/del',[FavoriteController::class, 'remove']);

Route::get('/post/index',[PostController::class, 'index']);
Route::get('/post/add',[PostController::class, 'add']);
Route::post('/post/add',[PostController::class, 'create']);
Route::get('/post/del',[PostController::class, 'delete']);
Route::post('/post/del',[PostController::class, 'remove']);

Route::get('/shop/index',[ShopController::class, 'index']);
Route::post('/shop/index',[ShopController::class, 'create']);
Route::get('/shop/del',[ShopController::class, 'delete']);
Route::post('/shop/del',[ShopController::class, 'remove']);
Route::get('/shop/search',[ShopController::class, 'search']);

Route::get('/shop/findplace',[ShopController::class, 'findplace']);
Route::post('/shop/findplace',[ShopController::class, 'searchplace']);
Route::get('/shop/findcategory',[ShopController::class, 'findcategory']);
Route::post('/shop/findcategory',[ShopController::class, 'searchcategory']);
Route::get('/shop/findcomplex',[ShopController::class, 'findcomplex']);
Route::post('/shop/findcomplex',[ShopController::class, 'searchcomplex']);
Route::get('/shop/edit',[ShopController::class, 'edit']);
Route::post('/shop/edit',[ShopController::class, 'update']);


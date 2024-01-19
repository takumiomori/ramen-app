<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopcategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('/shop/top');
});

Route::get('/dashboard', function () {
    return view('guest.guestpage');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    
    
});



//Route::get('/', function () {
//    return view('toppage');
//});

Route::get('/guest/index',[GuestController::class, 'index']);
Route::get('/guest/add',[GuestController::class, 'add']);
Route::post('/guest/add',[GuestController::class, 'create']);

Route::get('/shop/adminsearch',function(){return view('shop.adminsearch');});
Route::post('/shop/adminsearch',[ShopController::class, 'adminsearch']);
Route::get('/shop/searchresult',[ShopController::class, 'searchresult']);

Route::get('/shop/search',[ShopController::class, 'search']);
Route::get('/shop/findname',function(){return view('shop.findname');});
Route::post('/shop/findname',[ShopController::class, 'searchname']);
Route::get('/shop/findplace',[ShopController::class, 'findplace']);
Route::post('/shop/findplace',[ShopController::class, 'searchplace']);
Route::get('/shop/findcategory',[ShopController::class, 'findcategory']);
Route::post('/shop/findcategory',[ShopController::class, 'searchcategory']);
Route::get('/shop/findcomplex',[ShopController::class, 'findcomplex']);
Route::post('/shop/findcomplex',[ShopController::class, 'searchcomplex']);
Route::get('/shop/shoppage',[ShopController::class, 'show']);
Route::post('/shop/shoppage',[FavoriteController::class, 'create']);

Route::get('/',[ShopController::class, 'ranking']);

Route::middleware(['admin'])->group(function() {

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
    Route::get('/favorite/del',[FavoriteController::class, 'delete']);
    Route::post('/favorite/del',[FavoriteController::class, 'remove']);

    Route::get('/post/index',[PostController::class, 'index']);
    Route::get('/post/del',[PostController::class, 'delete']);
    Route::post('/post/del',[PostController::class, 'remove']);

    Route::get('/shop/index',[ShopController::class, 'index']);
    Route::post('/shop/index',[ShopController::class, 'create']);
    Route::get('/shop/del',[ShopController::class, 'delete']);
    Route::post('/shop/del',[ShopController::class, 'remove']);
    Route::get('/shop/edit',[ShopController::class, 'edit']);
    Route::post('/shop/edit',[ShopController::class, 'update']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/guest/edit',[GuestController::class, 'edit']);
    Route::post('/guest/edit',[GuestController::class, 'update']);
    Route::get('/guest/guestpage',[GuestController::class, 'show']);
    Route::get('/post/add',[PostController::class, 'add']);
    Route::get('/post/addresult',[PostController::class, 'addresult']);
    Route::post('/post/add',[PostController::class, 'create']);
});

/*
|--------------------------------------------------------------------------
| 管理者用ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {
    // 登録
    Route::get('register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [AdminRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [AdminLoginController::class, 'showLoginPage'])
        ->name('admin.login');

    Route::post('login', [AdminLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:admin'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('admin.auth.dashboard'))
            ->name('admin.dashboard');

            
    });

    
});
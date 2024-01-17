<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopcategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Guest\GuestLoginController;
use App\Http\Controllers\Guest\GuestRegisterController;
use Laravel\Jetstream\Jetstream;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/top', function () {
    return view('toppage');
});

Route::get('/guest/index',[GuestController::class, 'index'])->middleware(['auth']);
Route::get('/guest/add',[GuestController::class, 'add']);
Route::post('/guest/add',[GuestController::class, 'create']);
Route::get('/guest/del',[GuestController::class, 'delete'])->middleware(['auth']);
Route::post('/guest/del',[GuestController::class, 'remove'])->middleware(['auth']);
Route::get('/guest/edit',[GuestController::class, 'edit']);
Route::post('/guest/edit',[GuestController::class, 'update']);
Route::get('/guest/guestpage',[GuestController::class, 'show']);

Route::get('/place/index',[PlaceController::class, 'index'])->middleware(['auth']);
Route::post('/place/index',[PlaceController::class, 'create'])->middleware(['auth']);
Route::get('/place/del',[PlaceController::class, 'delete'])->middleware(['auth']);
Route::post('/place/del',[PlaceController::class, 'remove'])->middleware(['auth']);

Route::get('/shopcategory/index',[ShopcategoryController::class, 'index'])->middleware(['auth']);
Route::post('/shopcategory/index',[ShopcategoryController::class, 'create'])->middleware(['auth']);
Route::get('/shopcategory/del',[ShopcategoryController::class, 'delete'])->middleware(['auth']);
Route::post('/shopcategory/del',[ShopcategoryController::class, 'remove'])->middleware(['auth']);

Route::get('/favorite/index',[FavoriteController::class, 'index'])->middleware(['auth']);
Route::get('/favorite/del',[FavoriteController::class, 'delete'])->middleware(['auth']);
Route::post('/favorite/del',[FavoriteController::class, 'remove'])->middleware(['auth']);

Route::get('/post/index',[PostController::class, 'index'])->middleware(['auth']);
Route::get('/post/add',[PostController::class, 'add']);
Route::get('/post/addresult',[PostController::class, 'addresult']);
Route::post('/post/add',[PostController::class, 'create']);
Route::get('/post/del',[PostController::class, 'delete'])->middleware(['auth']);
Route::post('/post/del',[PostController::class, 'remove'])->middleware(['auth']);

Route::get('/shop/index',[ShopController::class, 'index'])->middleware(['auth']);
Route::post('/shop/index',[ShopController::class, 'create'])->middleware(['auth']);
Route::get('/shop/del',[ShopController::class, 'delete'])->middleware(['auth']);
Route::post('/shop/del',[ShopController::class, 'remove'])->middleware(['auth']);
Route::get('/shop/search',[ShopController::class, 'search']);

Route::get('/shop/findplace',[ShopController::class, 'findplace']);
Route::post('/shop/findplace',[ShopController::class, 'searchplace']);
Route::get('/shop/findcategory',[ShopController::class, 'findcategory']);
Route::post('/shop/findcategory',[ShopController::class, 'searchcategory']);
Route::get('/shop/findcomplex',[ShopController::class, 'findcomplex']);
Route::post('/shop/findcomplex',[ShopController::class, 'searchcomplex']);
Route::get('/shop/edit',[ShopController::class, 'edit'])->middleware(['auth']);
Route::post('/shop/edit',[ShopController::class, 'update'])->middleware(['auth']);
Route::get('/shop/shoppage',[ShopController::class, 'show']);
Route::post('/shop/shoppage',[FavoriteController::class, 'create']);

Route::get('/top',[ShopController::class, 'ranking']);

/*
|--------------------------------------------------------------------------
| 利用者用ルーティング
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
        Route::get('dashboard', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| 管理者用ルーティング
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
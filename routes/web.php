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


Route::get('/guest/add',[GuestController::class, 'add']);
Route::post('/guest/add',[GuestController::class, 'create']);

Route::get('/shop/adminsearch',function(){return view('shop.adminsearch');})->name('shop.adminsearch');
Route::post('/shop/adminsearch',[ShopController::class, 'adminsearch']);


Route::get('/shop/search',[ShopController::class, 'search'])->name('shop.search');
Route::get('/shop/findname',function(){return view('shop.findname');})->name('shop.findname');
Route::post('/shop/findname',[ShopController::class, 'searchname']);
Route::get('/shop/findplace',[ShopController::class, 'findplace'])->name('shop.findplace');
Route::post('/shop/findplace',[ShopController::class, 'searchplace'])->name('shop.post.findplace');
Route::get('/shop/findcategory',[ShopController::class, 'findcategory'])->name('shop.findcategory');
Route::post('/shop/findcategory',[ShopController::class, 'searchcategory']);
Route::get('/shop/findcomplex',[ShopController::class, 'findcomplex'])->name('shop.findcomplex');
Route::post('/shop/findcomplex',[ShopController::class, 'searchcomplex']);
Route::get('/shop/shoppage',[ShopController::class, 'show'])->name('shop.shoppage');

Route::get('/',[ShopController::class, 'ranking'])->name('top');


Route::middleware(['admin'])->group(function () {
    Route::get('/guest/index',[GuestController::class, 'index'])->name('guest.index');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/guest/del',[GuestController::class, 'delete'])->name('guest.del');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/place/index',[PlaceController::class, 'index'])->name('place.index');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/place/del',[PlaceController::class, 'delete'])->name('place.del');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/shopcategory/index',[ShopcategoryController::class, 'index'])->name('shopcategory.index');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/shopcategory/del',[ShopcategoryController::class, 'delete'])->name('shopcategory.del');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/favorite/index',[FavoriteController::class, 'index'])->name('favorite.index');
});
Route::middleware([ 'admin'])->group(function () {
    Route::get('/favorite/del',[FavoriteController::class, 'delete'])->name('favorite.del');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/post/index',[PostController::class, 'index'])->name('post.index');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/post/del',[PostController::class, 'delete'])->name('post.del');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/shop/index',[ShopController::class, 'index'])->name('shop.index');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/shop/del',[ShopController::class, 'delete'])->name('shop.del');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/shop/edit',[ShopController::class, 'edit'])->name('shop.edit');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/shop/searchresult',[ShopController::class, 'searchresult'])->name('shop.searchresult');
});


Route::post('/guest/del',[GuestController::class, 'remove']);
Route::post('/place/index',[PlaceController::class, 'create']);
Route::post('/place/del',[PlaceController::class, 'remove']);
Route::post('/shopcategory/index',[ShopcategoryController::class, 'create']);
Route::post('/shopcategory/del',[ShopcategoryController::class, 'remove']); 
Route::post('/favorite/del',[FavoriteController::class, 'remove']);
Route::post('/post/del',[PostController::class, 'remove']);
Route::post('/shop/index',[ShopController::class, 'create']);
Route::post('/shop/del',[ShopController::class, 'remove']);
Route::post('/shop/edit',[ShopController::class, 'update']);


Route::middleware(['auth'])->group(function () {
    Route::get('/guest/edit',[GuestController::class, 'edit'])->name('guest.edit');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/guest/edit',[GuestController::class, 'update']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/guest/guestpage',[GuestController::class, 'show'])->name('guest.page');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/post/add',[PostController::class, 'add'])->name('post.add');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/post/addresult',[PostController::class, 'addresult'])->name('post.addresult');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/favorite/add',[FavoriteController::class, 'add'])->name('favorite.add');
});

    Route::post('/post/add',[PostController::class, 'create']);
    Route::post('/favorite/add',[FavoriteController::class, 'create']);

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

    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:admin'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('admin.auth.dashboard'))
            ->name('admin.dashboard');
    });

    
});

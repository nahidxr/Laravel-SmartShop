<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\site\CartContoller;
use App\Http\Controllers\site\HomeController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/electronics',[HomeController::class,'electronics']);
Route::get('/item/{id}',[HomeController::class,'product']);
Route::post('/add_product/{id}',[CartContoller::class,'cart_add']);
// Route::post('/add_product/colour',[CartContoller::class,'store']);
Route::get('/checkout',[CartContoller::class,'checkout']);
Route::get('/cart/cart_remove_one_product/{id}',[CartContoller::class,'cart_remove_one_product']);
Route::get('/cart/cart_add_one_product/{id}',[CartContoller::class,'cart_add_one_product']);
Route::get('/cart/remove/{id}',[CartContoller::class,'cart_remove']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::prefix('/admin')->middleware(['auth',OnlyAdmin::class/*,'verified'*/])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
   Route::resource('/categories',CategoryController::class);
   Route::resource('/products',ProductController::class);
});


require __DIR__.'/auth.php';
 
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/search',[ProductController::class,'search']);

Route::get('/products/register',[ProductController::class,'register']);
Route::post('/products/register',[ProductController::class,'store']);

Route::get('/products/{productId}',[ProductController::class,'detail']);
Route::get('/products/{productId}/update',[ProductController::class,'update']);
Route::get('/products/{productId}/delete',[ProductController::class,'destroy']);



/* お見本 */
/*
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/products/search', [ProductController::class, 'getSearch']);
Route::post('/products/search', [ProductController::class, 'postSearch']);

Route::get('/products/register', [SeasonController::class, 'getRegister']);
Route::post('/product/upload', [ProductController::class, 'upload']);

Route::get('/products/detail/{product_id}', [ProductController::class, 'getDetail']);
Route::post('/products/update', [ProductController::class, 'postUpdate']);
Route::get('/products/{product_id}/delete', [ProductController::class, 'postDelete']);

*/
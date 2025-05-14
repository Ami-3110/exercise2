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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);

Route::post('/products/{productsId?}', [ProdauctController::class, 'detail']);

Route::patch('/products/{productsId?}/update', [ProdauctController::class, 'update']);

Route::get('/products/register', [ProdauctController::class, 'store']);

Route::get('/products/search', [ProdauctController::class, 'search']);

Route::delete('/products/{productsId?}/delete', [ProdauctController::class, 'destroy']);


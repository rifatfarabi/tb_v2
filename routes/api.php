<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::controller(AuthController::class)->group(function(){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class,'login']);
});
Route::post('logout',[ AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('/products', ProductController::class);
Route::get('cart/list',[CartController::class, 'cartList'])->name('cart.list');
Route::post('add/cart/{id}',[CartController::class, 'addTocart'])->name('add.cart');
Route::get('remove/cart',[CartController::class, 'removeTocart'])->name('remove.cart');

// Route::group(['prefix'=> 'produts'], function(){
//     Route::apiResource('/{product}/reviews', ReviewController::class);
// });


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Validator;
use App\Http\Controllers\ProductController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/profile',[AuthController::class,'profile']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('product', [ProductController::class, 'index']);


    Route::group(['middleware'=>'jwt.auth','prefix'=>'admin'],function($router){
        //  Route::get('products', [ProductController::class, 'index']);
        Route::get('products',[ProductController::class,'getProductsAdmin']);
        Route::get('products/{id}/show', [ProductController::class, 'show']);
        Route::post("productAdd", [ProductController::class, 'store']);
    
        //Route::put('products/{id}/update', [ProductController::class, 'update']);
        Route::post('products/{id}/update', [ProductController::class, 'update']);
        Route::delete('products/{id}/delete', [ProductController::class, 'destroy']);   
    });

});



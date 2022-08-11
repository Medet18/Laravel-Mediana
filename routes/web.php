<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use Carbon\Carbon;

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

Route::get('/login',[UserAuthController::class, 'login'])->name('login');
Route::get('/register',[UserAuthController::class, 'register'])->name('register');
Route::post('/create', [UserAuthController::class,'create'])->name('auth.create');

//////////////////

Route::get('/test', function(){
    echo strtotime("10 Sepetember 2021");
});



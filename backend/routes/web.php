<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Register;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/top',function(){
    return view('preRegister');
});

Route::post('/pre-register',[Register::class,'preRegister'])->name('pre');

Route::get('/register',[HomeController::class,'showForm']);

Route::post('/update',[Register::class,'register'])->name('honban');

Route::get('/info', function(){
    echo phpinfo();
});
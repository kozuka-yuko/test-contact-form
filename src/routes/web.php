<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
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

Route::get('/',[ContactController::class,'index']);
Route::post('/contacts/confirm',[ContactController::class,'confirm']);
Route::post('/contacts',[ContactController::class,'store']);
Route::delete('/contacts/{contact_id}',[ContactController::class,'destroy']);

Route::get('/categories',[CategoryController::class,'index']);

Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/admin',[RegisterController::class,'register'])->middleware('admin');
Route::post('login', [RegisterController::class,'store'])->middleware('Register');
Route::post('logout', [RegisterController::class, 'destroy']);
<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/',App\Http\Controllers\EnquiryController::class);

Route::post('/carajax', [App\Http\Controllers\EnquiryController::class, 'Carajax'])->name('car.ajax');

Route::post('/Carmodelajax', [App\Http\Controllers\EnquiryController::class, 'Carmodelajax'])->name('carmodel.ajax');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function (){
    return view('logins');
});

Route::get('/login', 'App\Http\Controllers\user@bookis')->name('bookis');

Route::get('/insertBook', 'App\Http\Controllers\user@cont')->name('insertBook');
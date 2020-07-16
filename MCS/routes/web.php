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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', 'ImageGeneral@upload');
Route::post('/upload', 'ImageGeneral@upload');
Route::get('/all','ImageGeneral@aboutall');
Route::get('/one/{name}','ImageGeneral@aboutone');

Route::get('/dir', 'ImageGeneral@scan_dir');
 

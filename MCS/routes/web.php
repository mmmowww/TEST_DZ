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

/////
Route::get('/api/v1/images/upload', 'Upload@UP');
Route::post('/api/v1/images/upload', 'Upload@UP');
/////
Route::get('/api/v1/images/','Aboutall@aboutall');
Route::get('/api/v1/images/{NameImage}','Aboutone@aboutone');


 
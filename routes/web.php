<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;

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
Route::get('/home', function () {
    return view('home');
});
Route::get('/lesRdv', function () {
    return view('lesRdv');
})->name("lesRdv");
Route::get('/lesDemandes', function () {
    return view('demandList');
})->name("lesDemandes");
Route::get('getList', [DemandeController::class, 'demandelist'])->name('getList');


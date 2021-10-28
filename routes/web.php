<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard');

Route::get('/meetings', fn () => view('meetings/index'))->name('meetings');
Route::get('/demands', fn () => view('demands/index'))->name('demands');
Route::view('/test', 'meetings/show')->name('meetings.show');

require __DIR__ . '/auth.php';

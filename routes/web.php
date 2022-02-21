<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Demand;

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
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard');

Route::get('/export/{period?}', [DashboardController::class, 'export'])->name('excel.export');

Route::get('/meetings', fn () => view('meetings/index'))->middleware(['auth'])->name('meetings');
Route::get('/demands/{period?}', fn () => view('demands/index'))->middleware(['auth'])->name('demands');
Route::view('/test', 'meetings/show')->name('meetings.show');

Route::get('a', function() {
    $demands = Demand::with(['document', 'user', 'encloseds', 'rejection', 'documentForm'])->get();
    dd($demands);
});

require __DIR__ . '/auth.php';

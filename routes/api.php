<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\DemandsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->get('/meetings', [MeetingsController::class, 'index'])->name('api.meetings.index');
Route::middleware(['auth:api', 'can:is-admin'])->delete('/meetings/{meeting}', [MeetingsController::class, 'destroy'])->name('api.meetings.delete');
Route::middleware(['auth:api'])->get('/demands', [DemandsController::class, 'index'])->name('api.demands.index');
Route::middleware(['auth:api', 'can:is-admin'])->put('/demands/{demand}', [DemandsController::class, 'update'])->name('api.demands.update');
Route::middleware(['auth:api', 'can:is-admin'])->put('/demands/{demand}/reject', [DemandsController::class, 'reject'])->name('api.demands.reject');

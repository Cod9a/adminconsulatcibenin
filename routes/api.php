<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\WaitingQueueItemController;

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
Route::middleware(['auth:api'])->delete('/meetings/{meeting}', [MeetingsController::class, 'destroy'])->name('api.meetings.delete');
Route::middleware(['auth:api'])->get('/demands/{period?}', [DemandsController::class, 'index'])->name('api.demands.index');
Route::middleware(['auth:api'])->put('/demands/{demand}', [DemandsController::class, 'update'])->name('api.demands.update');
Route::middleware(['auth:api'])->put('/demands/{demand}/reject', [DemandsController::class, 'reject'])->name('api.demands.reject');
Route::middleware(['auth:api'])->put('/demands/{demand}/validate', [DemandsController::class, 'validated'])->name('api.demands.validate');

Route::middleware(['auth:api'])->get('/waiting-queue-items', [WaitingQueueItemController::class, 'index'])->name("waiting-queue-items.index");
Route::middleware(['auth:api'])->post('/waiting-queue-items', [WaitingQueueItemController::class, 'store'])->name("waiting-queue-items.store");
Route::middleware(['auth:api'])->delete('/waiting-queue-items/{waitingQueueItem}', [WaitingQueueItemController::class, 'destroy'])->name("waiting-queue-items.destroy");

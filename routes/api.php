<?php

use App\Http\Controllers\IndicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/indications', [IndicationController::class, 'index'])->name('indication.index');
Route::post('/indications', [IndicationController::class, 'store'])->name('indication.store');
Route::put('indications/{indication}', [IndicationController::class, 'update'])->name('indication.update');
Route::put('indications/{indication}/status', [IndicationController::class, 'updateStatus'])->name('indication.updateStatus');
Route::get('indications/{indication}', [IndicationController::class, 'show'])->name('indication.show');
Route::delete('indications/{indication}', [IndicationController::class, 'destroy'])->name('indication.destroy');

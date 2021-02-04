<?php

use App\Http\Controllers\RecordsController;
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

Route::get('records', [RecordsController::class, 'index']);
Route::group(['prefix' => 'record'], function () {
    Route::post('add', [RecordsController::class, 'add']);
    Route::get('edit/{id}', [RecordsController::class, 'edit']);
    Route::post('update/{id}', [RecordsController::class, 'update']);
    Route::delete('delete/{id}', [RecordsController::class, 'delete']);
});

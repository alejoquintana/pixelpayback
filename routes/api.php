<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


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
Route::controller(ItemController::class)->group(function () {
    Route::get('items', 'get')->name('items.get');
    Route::post('item', 'create')->name('items.create');
    Route::put('item', 'update')->name('items.update');
    Route::delete('item/{id}', 'destroy')->name('items.destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

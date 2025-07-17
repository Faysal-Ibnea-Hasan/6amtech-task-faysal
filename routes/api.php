<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Inventory\InventoryController;
use App\Http\Controllers\Api\Task\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'inventory'], function () {
    Route::get('/before',[InventoryController::class,'before']);
    Route::get('/after',[InventoryController::class,'after']);
});


Route::middleware('api')->group(function () {
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);

        Route::group(['prefix' => 'task'], function () {
            Route::get('/', [TaskController::class, 'index']);
            Route::post('add', [TaskController::class, 'store']);
            Route::get('details/{id}', [TaskController::class, 'show']);
            Route::post('update/{id}', [TaskController::class, 'update']);
            Route::delete('delete/{id}', [TaskController::class, 'destroy']);
        });
    });
});

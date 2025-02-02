<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function (){
        Route::apiResources([
            'categories' => CategoryController::class,
            'suppliers' => SupplierController::class,
        ]);
    });
});
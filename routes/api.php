<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminControoler;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin/stats', [AdminControoler::class, 'stats']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/search', [BookController::class, 'search']);
Route::get('/books/popular', [BookController::class, 'getPopular']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

   
    Route::middleware(['admin.access'])->group(function () {
        Route::post('/books', [BookController::class, 'store']);       
        Route::put('/books/{id}', [BookController::class, 'update']);  
        Route::delete('/books/{id}', [BookController::class, 'destroy']); 
        Route::get('/admin/stats', [AdminControoler::class, 'stats']);
        Route::get('/books/degraded', [AdminControoler::class, 'ViewDegraded']);
        Route::patch('/books/{id}/condition', [BookController::class, 'updateCondition']); 

        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
        Route::post('/creatCategory', [CategoryController::class, 'store']);
    });
});
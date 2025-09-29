<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Test Route
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

//Get all categories
Route::get('/categories', [App\Http\Controllers\ItemCategoryController::class, 'index']);

//Get single category by ID
Route::get('/categories/{id}', [App\Http\Controllers\ItemCategoryController::class, 'show']);

//Create new category
Route::post('/categories', [App\Http\Controllers\ItemCategoryController::class, 'store']);

//Update category by ID
Route::put('/categories/{id}', [App\Http\Controllers\ItemCategoryController::class, 'update']);

//Delete category by ID
Route::delete('/categories/{id}', [App\Http\Controllers\ItemCategoryController::class, 'destroy']); 

//For items table

//Get all items
Route::get('/items', [App\Http\Controllers\ItemsController::class, 'index']);

//Get single item
Route::get('/items/{id}', [App\Http\Controllers\ItemsController::class, 'show']);

//Create new item
Route::post('/items', [App\Http\Controllers\ItemsController::class, 'store']);

//Update item
Route::put('/items/{id}', [App\Http\Controllers\ItemsController::class, 'update']);

//Delete item
Route::delete('/items/{id}', [App\Http\Controllers\ItemsController::class, 'destroy']); 

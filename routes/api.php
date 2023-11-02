<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['cors'])->group(function () {
    // Filter Component (Filter Data + Filter Structure)
    Route::get('/post/component/filter/structure', [FilterController::class, 'getPostFilterStructure']); // Done
    Route::get('/post/component/filter/data', [FilterController::class, 'getPostFilterData']); // Will do that on stage 2

    // Data Component (Table Data+ Table Structure)
    Route::get('/post/component/table/structure', [FilterController::class, 'getPostTableStructure']); // Talk with Rashed bhai pass static json
    Route::get('/post/component/table/data', [FilterController::class, 'getPostTableData']); // Done

    // Relation Data
    Route::get('/post/relation/category/list', [FilterController::class, 'getCategoryRelationData']); //url encoded searching enabled
    Route::get('/post/relation/category/selected', [FilterController::class, 'getCategoryRelationSelectedData']);
});

// Testing
Route::get('/test', [FilterController::class, 'testFunction']);

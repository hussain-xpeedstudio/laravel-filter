<?php

use App\Http\Controllers\FilterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware(['cors'])->group(function () {
Route::get('/module/people/post/component/filter/structure', [FilterController::class, 'getFilterStructure']); // Done
Route::get('/module/people/post/component/filter/content', [FilterController::class, 'getFilterContent']); // Will do that on stage 2
Route::post('/module/people/post/component/filter/content/store/{filter?}', [FilterController::class, 'storeFilterContent']);
Route::get('/module/people/post/component/filter/content/delete/{filter}', [FilterController::class, 'deleteFilterContent']);

// Data Component (Table Data+ Table Structure)
Route::get('/module/people/post/component/table/structure', [FilterController::class, 'getContentStructure']); // Talk with Rashed bhai pass static json
Route::get('/module/people/post/component/table/content', [FilterController::class, 'getContent']); // Done

// Relation Data
Route::get('/module/people/post/relation/category/list', [FilterController::class, 'getCategoryRelationData']); //url encoded searching enabled
Route::get('/module/people/post/relation/category/selected', [FilterController::class, 'getCategoryRelationSelectedData']);
//});

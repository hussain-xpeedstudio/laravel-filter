<?php

use Illuminate\Support\Facades\Route;
use SyntheticFilters\Controllers\FilterController;

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

Route::get('api/filter/{table_id}', [FilterController::class, 'filterStructureGet']);
Route::post('api/filter/{table}/{table_id}', [FilterController::class, 'filterStructureSave']);

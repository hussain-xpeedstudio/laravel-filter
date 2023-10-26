<?php

use SyntheticFilter\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SyntheticFilters\Controllers\FilterController;
Route::get('api/get-table-filter-data', [FilterController::class, 'index']);
Route::get('api/form-filter-conditions', [FilterController::class, 'filter_condition']);

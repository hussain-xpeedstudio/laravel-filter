<?php

use Illuminate\Support\Facades\Route;
use App\Models\Document;
use SyntheticComments\Models\Comment;
use App\Http\Controllers\ResponseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/response',[ResponseController::class,'getResponse']);
Route::get('/attribute',function(){
   // return Document::$filter_attribute;
   $data=new Document();
    return $data->getFilterData();
});
Route::get('/attribute1',function(){
   $data=new Document();
   return $data->filter();
    
});
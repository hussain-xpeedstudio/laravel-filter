<?php

use App\Http\Controllers\ResponseController;
use App\Models\Document;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
Route::get('/response', [ResponseController::class, 'getResponse']);
Route::get('/attribute', function () {
    // return Document::$filter_attribute;
    $data = new Document;
    return $data->getFilterData();
});
Route::get('/attribute1', function () {
    $data = new Document;
    return $data->filter();
});

Route::get('/aaaa', function () {
    // $user = new App\Models\User();
    // $user->name = 'bijoy';
    // $user->email = 'bijoy@mail.com';
    // $user->password = bcrypt('admin');
    // $user->save();
    $data = Post::all();
    foreach ($data as $key => $value) {
        $value->user_id = '6542113377fe565488073882';
        $value->save();
    }
});

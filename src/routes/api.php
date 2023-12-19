<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::controller(PostController::class)->prefix('board')->group(function () {
    Route::get('post', 'post')->name('post.post');
    Route::get('get', 'get')->name('post.get');
    Route::post('post', 'post')->name('post.post2');
    Route::post('get', 'get')->name('post.get2');
});

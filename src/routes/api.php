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
    Route::get('cluster', 'cluster')->name('cluster.get');//clusterからgetは叩けないけどブラウザからの確認用に。
    Route::post('cluster', 'cluster')->name('cluster.post');

    Route::get('resonite', 'getResonite')->name('resonite.get');
    Route::post('resonite', 'postResonite')->name('resonite.post');
});

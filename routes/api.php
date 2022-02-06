<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Post Api
Route::get('v1/post/index', [PostController::class,'index']);
Route::post('v1/post/store', [PostController::class,'store']);
Route::post('v1/post/update/{id}', [PostController::class,'update']);
Route::delete('v1/post/destroy/{id}', [PostController::class,'destroy']);

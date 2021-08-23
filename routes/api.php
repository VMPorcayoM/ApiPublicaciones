<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\API\CommentController;

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


Route::group(["middleware" => "apikey.validate"], function () {

    Route::apiResource('posts',PostController::class);
    Route::apiResource('posts/{id}', PostController::class); 
    Route::post('posts',[PostController::class,'store']);
    Route::apiResource('comments/{id}',CommentController::class);
  
});
  


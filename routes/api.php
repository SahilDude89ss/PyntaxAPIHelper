<?php

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

Route::get('/api/{resource}/{id?}', \Pyntax\Http\Controllers\Api\Resources\GetController::class . '@getResource');
Route::post('/api/{resource}', \Pyntax\Http\Controllers\Api\Resources\PostController::class . '@createResource');
Route::put('/api/{resource}', \Pyntax\Http\Controllers\Api\Resources\PutController::class . '@updateResource');
Route::delete('/api/{resource}/{id}', \Pyntax\Http\Controllers\Api\Resources\DeleteController::class . '@deleteResource');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/adminDashboard/create/user',[AdminController::class , 'store']);
Route::get('/users',[AdminController::class , 'users']);
Route::post('/user/{user}/deactivate',[AdminController::class , 'deactivate']);
Route::delete('user/{user}/delete',[AdminController::class , 'destroy']);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get("/", [PagesController::class, "index"]);

Route::get("login", [PagesController::class, "create"])->name('login');

Route::post("validate", [PagesController::class, "login"])->name('validate');

Route::get("info", [PagesController::class, "show"]);

Route::get("logout", [PagesController::class, "logout"]);

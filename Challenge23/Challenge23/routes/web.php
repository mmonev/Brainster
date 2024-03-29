<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get("/", [PageController::class, 'index'])->name('index');
Route::get("aboutme", [PageController::class, 'aboutMe'])->name('aboutme');
Route::get("sample", [PageController::class, 'sample'])->name('sample');
Route::get("contact", [PageController::class, 'contact'])->name('contact');

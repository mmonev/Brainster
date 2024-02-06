<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::put('/employee', [EmployeeController::class, 'store'])->name('employee');

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [ProjectController::class, 'create'])->name('dashboard.create');
  Route::get('/projects/all', [ProjectController::class, 'index'])->name('show.projects');
  Route::post('/project/create', [ProjectController::class, 'store'])->name('store.project');
  Route::delete('/projects/delete/{project}', [ProjectController::class, 'destroy'])->name('delete.project');
  Route::post('/projects/update/{project}', [ProjectController::class, 'update'])->name('update.project');
});
require __DIR__ . '/auth.php';

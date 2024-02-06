<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/adminDashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'isAdmin'])
    ->name('dashboard');


Route::get('validation/{email}/{hash}', [AdminController::class, 'validation'])
    ->name('validation');

Route::view('expired/link', 'linkexpired')
->name('expired');

Route::post('resend/{email}/link', [AdminController::class , 'resend'])
->name('resend.link');



    
Route::view('/userDashoard', 'welcome')
->middleware('auth')
->name('userDashboard');

require __DIR__ . '/auth.php';

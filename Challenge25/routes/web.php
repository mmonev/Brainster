<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscussionController;

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

// Route::get('/', function () {
//     return view('welcome');
// }); 

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',           [HomeController::class, 'index'])->name('home.index');
Route::get('/home/{home}',[HomeController::class, 'show'])->name('home.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('discussions', DiscussionController::class);
    Route::resource('comments', CommentController::class);
    Route::get('comments/{comment}', [CommentController::class, 'create2'])->name('comments.create2');
    Route::get('admin/index', [DiscussionController::class, 'adminView'])->name('admin.index')->middleware('admin');
    Route::put('admin/{discussion}', [DiscussionController::class, 'approve'])->name('discussions.approve')->middleware('admin');
    
   
});

require __DIR__.'/auth.php';

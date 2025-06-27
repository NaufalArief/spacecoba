<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PublicMemberController; // <-- Import controller publik
use App\Http\Controllers\PublicPostsController; // <-- Import controller publik
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rute untuk halaman member publik (diperbarui)
Route::get('/members', [PublicMemberController::class, 'index'])->name('members');
// Rute untuk halaman detail member
Route::get('/members/{member:npm}', [PublicMemberController::class, 'show'])->name('members.show');

Route::get('/about', [PublicPostsController::class, 'index'])->name('posts');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('members', AdminMemberController::class); // Menggunakan controller admin
    Route::resource('posts', PostController::class);
});


// Auth Routes dari Breeze...
require __DIR__ . '/auth.php';

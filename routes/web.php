<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\PasswordController;

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

require __DIR__ . '/auth.php';


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:admin_users', 'verified'])->name('dashboard');

Route::middleware(['auth:admin_users', 'verified'])->group(function () {
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/passsword', [PasswordController::class, 'edit'])->name('edit-password');
    Route::put('/password', [PasswordController::class, 'update'])->name('update-password');
    //
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:admin_users', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
    // Route::patch('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::patch('/edit-password', [ProfileController::class, 'update'])->name('edit-password');
});

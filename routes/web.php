<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----------------User panel----------
Route::group(['middleware' => 'userAuth', 'prefix' => '/user/'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// -----------------Admin panel----------
Route::group(['middleware' => 'adminAuth', 'prefix' => '/admin/'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('user-list', [AdminController::class, 'getUserDetails'])->name('admin.user-list');
    Route::get('edit/{id}', [AdminController::class, 'getUserDetailsID'])->name('admin.edit');
    Route::post('delete', [AdminController::class, 'getUserDetails'])->name('admin.delete');
    Route::post('update', [AdminController::class, 'updateUserDetails'])->name('admin.update');
    Route::get('delete/{id}', [AdminController::class, 'deleteUserDetails'])->name('admin.delete');
});

require __DIR__ . '/auth.php';

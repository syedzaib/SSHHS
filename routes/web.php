<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }

    return view('auth.login'); // or 'welcome' if you want a custom landing page
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin/approve/{user}', [AdminController::class, 'approve'])->name('admin.approve');
        // Edit user
        Route::get('/admin/user/{user}/edit', [AdminController::class, 'edit'])->name('admin.user.edit');
        Route::put('/admin/user/{user}', [AdminController::class, 'update'])->name('admin.user.update');
        Route::delete('/admin/user/{user}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
});


require __DIR__.'/auth.php';

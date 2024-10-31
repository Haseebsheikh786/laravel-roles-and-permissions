<?php

use App\Http\Controllers\PermissonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
     // Permission CRUD routes
     Route::get('/permissions', [PermissonController::class, 'index'])->name('permissions.index');       // List all permissions
     Route::get('/permissions/create', [PermissonController::class, 'create'])->name('permissions.create'); // Show form to create permission
     Route::post('/permissions', [PermissonController::class, 'store'])->name('permissions.store');        // Store new permission
     Route::get('/permissions/{permission}/edit', [PermissonController::class, 'edit'])->name('permissions.edit'); // Show form to edit permission
     Route::put('/permissions/{permission}', [PermissonController::class, 'update'])->name('permissions.update');  // Update existing permission
     Route::delete('/permissions/{permission}', [PermissonController::class, 'destroy'])->name('permissions.destroy'); // Delete permission
    
});

require __DIR__.'/auth.php';

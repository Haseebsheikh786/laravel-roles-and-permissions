<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PermissonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

    // role CRUD routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit'); // Show form to edit permission
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');  // Update existing permission
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy'); // Delete permission
    // articles CRUD routes
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit'); 
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');  
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy'); 
    // user routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); 
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');  
});

require __DIR__ . '/auth.php';

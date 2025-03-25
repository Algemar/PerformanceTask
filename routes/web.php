<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Posts index
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Role routes
Route::post('/roles', [PostController::class, 'storeRole'])->name('roles.store');
Route::put('/roles/{id}', [PostController::class, 'updateRole'])->name('roles.update');
Route::delete('/roles/{id}', [PostController::class, 'deleteRole'])->name('roles.delete');

// Permission routes
Route::post('/permissions', [PostController::class, 'storePermission'])->name('permissions.store');
Route::put('/permissions/{id}', [PostController::class, 'updatePermission'])->name('permissions.update');
Route::delete('/permissions/{id}', [PostController::class, 'deletePermission'])->name('permissions.delete');

// Assign permission
Route::post('/assign-permission', [PostController::class, 'assignPermission'])->name('permissions.assign');

<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Client\TaskController as ClientTaskController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'role:client'])->group(function (): void {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/cases', [CaseController::class, 'index'])->name('cases.index');
    Route::get('/cases/{case}', [CaseController::class, 'show'])->name('cases.show');

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

    Route::get('/tasks', [ClientTaskController::class, 'index'])->name('tasks.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function (): void {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', AdminUserController::class)->only(['index']);
    Route::resource('tasks', AdminTaskController::class);
    Route::resource('documents', AdminDocumentController::class)->only(['index', 'show']);

    Route::resource('cases', CaseController::class)->except(['index', 'show']);
});

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

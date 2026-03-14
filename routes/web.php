<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Client\TaskController as ClientTaskController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::resource('cases', CaseController::class)->only(['index', 'show']);
    Route::resource('documents', DocumentController::class)->only(['index', 'store']);
    Route::get('documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::get('tasks', [ClientTaskController::class, 'index'])->name('client.tasks.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class)->only(['index']);
    Route::resource('cases', CaseController::class)->except(['index', 'show']);
    Route::resource('documents', AdminDocumentController::class)->only(['index', 'show']);
    Route::resource('tasks', AdminTaskController::class)->except(['show']);
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


// Public landing (could be auth routes from Breeze)
Route::get('/', function () {
    return redirect()->route('tickets.index');
});

// Ticket resource routes protected by auth
Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);

    // Comments
    Route::post('tickets/{ticket}/comments', [CommentController::class, 'store'])->name('tickets.comments.store');

    // Assign technician (admin)
    Route::post('tickets/{ticket}/assign', [TicketController::class, 'assign'])->name('tickets.assign');

    // Change status (technician or admin)
    Route::post('tickets/{ticket}/status', [TicketController::class, 'changeStatus'])->name('tickets.changeStatus');

    // Users management (admin)
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

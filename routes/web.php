<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página Principal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Tickets
    |--------------------------------------------------------------------------
    */

    Route::resource('tickets', TicketController::class);

    Route::post(
        'tickets/{ticket}/comments',
        [CommentController::class, 'store']
    )->name('tickets.comments.store');

    Route::post(
        'tickets/{ticket}/assign',
        [TicketController::class, 'assign']
    )->name('tickets.assign');

    Route::post(
        'tickets/{ticket}/status',
        [TicketController::class, 'changeStatus']
    )->name('tickets.changeStatus');

    /*
    |--------------------------------------------------------------------------
    | Usuarios
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class)->except(['show']);

    Route::post(
        'users/{id}/restore',
        [UserController::class, 'restore']
    )->name('users.restore');

});
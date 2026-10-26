<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $mine = Task::where('user_id', Auth::id());

        return view('dashboard', [
            'total'     => (clone $mine)->count(),
            'pending'   => (clone $mine)->where('status', 'pending')->count(),
            'completed' => (clone $mine)->where('status', 'completed')->count(),
        ]);
    })->name('dashboard');

    Route::resource('tasks', TaskController::class)->except('show');
    Route::patch('/tasks/{id}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
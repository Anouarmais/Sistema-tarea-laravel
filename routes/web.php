<?php

use App\Http\Controllers\dataController , App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::redirect('/', 'login');

Route::post('task' ,[TaskController::class, 'store'])->name('task.store');
Route::put('/task/update', [TaskController::class, 'update'])->name('task.update');




Route::get('dashboard', [dataController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/tasksvista', [dataController::class, 'tasksView'])
    ->middleware(['auth', 'verified'])
    ->name('tasksvista');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

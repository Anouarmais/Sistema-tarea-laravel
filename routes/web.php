<?php
use App\Http\Controllers\dataController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');


Route::get('/vistauser', [DataController::class, 'mistareas'])
    ->middleware('auth')
    ->name('vistauser');


Route::post('task' ,[TaskController::class, 'store'])->name('task.store');

Route::put('/task/update', [TaskController::class, 'update'])->name('task.update');

Route::get('tasksvista', function (Request $request) {
    if ($request->user()?->role !== 'admin') {
        abort(403, 'Acceso no autorizado');
    }
    return app(DataController::class)->tasksView();
})->middleware(['auth', 'verified'])->name('tasksvista');

 Route::middleware(['auth'])->group(function () {
        Route::delete('/tasks/{id}', [TaskController::class, 'deleteTask'])->name('task.delete');
    });
    
Route::get('/tasksvista', [dataController::class, 'tasksView'])
    ->middleware(['auth', 'verified'])
    ->name('tasksvista');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

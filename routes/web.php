<?php

use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('leads.index')
        : redirect()->route('login');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('leads', LeadController::class);

    Route::post('leads/{lead}/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::patch('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

});


require __DIR__.'/auth.php';

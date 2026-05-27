<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    //employee management
    Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employees/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employees', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employees/{id}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee.delete');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('login', [LoginController::class, 'login']);
Route::post('action-login', [LoginController::class, 'actionLogin']);

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('/admin/employees', EmployeesController::class);
});

// Employee Routes
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/karyawan/dashboard', [UserController::class, 'karyawanDashboard'])->name('karyawan.dashboard');
});

// Dashboard
// get, post, put, delete
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');

// Employees CRUD
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');

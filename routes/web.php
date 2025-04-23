<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuestionScoresController;
use App\Http\Controllers\ScoresController;

Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('login', [LoginController::class, 'login']);
Route::post('action-login', [LoginController::class, 'actionLogin']);

// USERS
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::resource('users', UserController::class);
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/settings', [UserController::class, 'settings'])->name('settings');

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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');

// Employees CRUD
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

// QUESTION CRUD
Route::resource('questionscores', QuestionScoresController::class);
Route::get('/questionsscores', [QuestionScoresController::class, 'index'])->name('questionsscores.index');
Route::get('/questionsscores/create', [QuestionScoresController::class, 'create'])->name('questionsscores.create');
Route::post('/questionsscores', [QuestionScoresController::class, 'store'])->name('questionsscores.store');
Route::get('/questionsscores/{id}/edit', [QuestionScoresController::class, 'edit'])->name('questionsscores.edit');
Route::put('/questionsscores/{id}', [QuestionScoresController::class, 'update'])->name('questionsscores.update');

// SCORES CRUD
Route::resource('scores', ScoresController::class);
Route::get('/scores', [ScoresController::class, 'index'])->name('score.index');
Route::get('/scores/create', [ScoresController::class, 'create'])->name('score.create');
Route::post('/scores', [ScoresController::class, 'store'])->name('score.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

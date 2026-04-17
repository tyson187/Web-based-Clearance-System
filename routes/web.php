<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

// Login page
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

// Login form submission
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED BY MIDDLEWARE)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('admin.auth')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/students', [AdminController::class, 'students'])
            ->name('students');

        Route::get('/departments', [AdminController::class, 'departments'])
            ->name('departments');

        Route::get('/clearance', [AdminController::class, 'clearance'])
            ->name('clearance');
    });


/*
|--------------------------------------------------------------------------
| CLEARANCE ACTIONS (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::post('/clearance/approve/{id}', [AdminController::class, 'approve'])
    ->middleware('admin.auth')
    ->name('clearance.approve');

Route::post('/clearance/reject/{id}', [AdminController::class, 'reject'])
    ->middleware('admin.auth')
    ->name('clearance.reject');


/*
|--------------------------------------------------------------------------
| STUDENT VIEW (SAMPLE / DEMO)
|--------------------------------------------------------------------------
*/

Route::get('/student', [AdminController::class, 'student'])
    ->name('student.dashboard');


/*
|--------------------------------------------------------------------------
| DEFAULT REDIRECT
|--------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

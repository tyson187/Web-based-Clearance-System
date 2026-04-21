<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepartmentController;

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

// Register page
Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

// Register form submission
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| USER ROUTES (PROTECTED BY AUTH MIDDLEWARE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| DEPARTMENT ROUTES (PROTECTED BY DEPARTMENT.AUTH MIDDLEWARE)
|--------------------------------------------------------------------------
*/

Route::middleware('department.auth')->group(function () {
    Route::get('/department/dashboard', [DepartmentController::class, 'dashboard'])
        ->name('department.dashboard');
    
    Route::get('/department/engineering', [DepartmentController::class, 'engineering'])
        ->name('department.engineering');
    
    Route::get('/department/search', [DepartmentController::class, 'searchStudents'])
        ->name('department.search');
    
    Route::post('/department/clearance/approve/{id}', [DepartmentController::class, 'approveClearance'])
        ->name('department.clearance.approve');
    
    Route::post('/department/clearance/reject/{id}', [DepartmentController::class, 'rejectClearance'])
        ->name('department.clearance.reject');
});


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

        Route::post('/clearance/approve/{id}', [AdminController::class, 'approve'])
            ->name('clearance.approve');

        Route::post('/clearance/reject/{id}', [AdminController::class, 'reject'])
            ->name('clearance.reject');
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

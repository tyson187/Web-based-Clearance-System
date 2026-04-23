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

// Route::controller('App\Http\Controllers\Auth\LoginDepartmentController')->group(function () {

//         Route::get('/login', 'showLoginForm')->name('department.login');

//         Route::post('/login', 'login');
// });

// Login Routes

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');



Route::get('/dashboard/cs', [LoginController::class, 'showCS'])->name('dept.cs.dashboard');

    Route::get('/dashboard/educ', [LoginController::class, 'showEDUC'])->name('dept.educ.dashboard');

    Route::get('/dashboard/cbm', [LoginController::class, 'showCBM'])->name('dept.cbm.dashboard');

    Route::get('/dashboard/eng', [LoginController::class, 'showEng'])->name('dept.eng.dashboard');

    Route::get('/dashboard/library', [LoginController::class, 'showLibrary'])->name('dept.library.dashboard');
    
    Route::get('/dashboard/datacenter', [LoginController::class, 'showDataCenter'])->name('dept.datacenter.dashboard');
    
    Route::get('/dashboard/accounting', [LoginController::class, 'showAccounting'])->name('dept.accounting.dashboard');
// Route::get('/login', [LoginController::class, 'showLogin'])
//     ->name('login');

// // Login form submission
// Route::post('/login', [LoginController::class, 'login'])
//     ->name('login.post');


    
    
//     // CS Department
//     Route::get('/dashboard/cs', [LoginDepartmentController::class, 'showCS'])->name('dept.cs.dashboard');

//     Route::get('/dashboard/educ', [LoginDepartmentController::class, 'showEDUC'])->name('dept.educ.dashboard');

//     Route::get('/dashboard/cbm', [LoginDepartmentController::class, 'showCBM'])->name('dept.cbm.dashboard');

//     // Engineering Department
//     Route::get('/dashboard/engineering', [LoginDepartmentController::class, 'showEng'])->name('dept.eng.dashboard');

//     // Library Department
//     Route::get('/dashboard/library', [LoginDepartmentController::class, 'showLibrary'])->name('dept.library.dashboard');
    
// Route::get('/department/dean.CSS', 'App\Http\Controllers\Auth\LoginDepartmentController@index')->name('department.deanCSS');
// Route::get('/department/dean.CBM', 'App\Http\Controllers\Auth\CbmController@index')->name('department.deanCBM');
// Route::get('/department/dean.EDUC', 'App\Http\Controllers\Auth\EducController@index')->name('department.deanEDUC');
// Route::get('/department/dean.ENG', 'App\Http\Controllers\Auth\EngController@index')->name('department.deanENG');
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

// Route::middleware('department.auth')->group(function () {
//     Route::get('/department/dashboard', [DepartmentController::class, 'dashboard'])
//         ->name('department.dashboard');
    
//     Route::get('/department/cbm', [DepartmentController::class, 'cbm'])
//         ->name('department.cbm');
    
//     Route::get('/department/css', [DepartmentController::class, 'css'])
//         ->name('department.css');
    
//     Route::get('/department/educ', [DepartmentController::class, 'educ'])
//         ->name('department.educ');
    
//     Route::get('/department/engineering', [DepartmentController::class, 'engineering'])
//         ->name('department.engineering');

//     Route::get('/department/library', [DepartmentController::class, 'library'])
//         ->name('department.library');
    
//     Route::get('/department/search', [DepartmentController::class, 'searchStudents'])
//         ->name('department.search');
    
//     Route::post('/department/clearance/approve/{id}', [DepartmentController::class, 'approveClearance'])
//         ->name('department.clearance.approve');
    
//     Route::post('/department/clearance/reject/{id}', [DepartmentController::class, 'rejectClearance'])
//         ->name('department.clearance.reject');
// });


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

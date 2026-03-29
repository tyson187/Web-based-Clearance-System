<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ClearanceController;

Route::post('/logout', function () {

    if (auth('admin')->check()) {
        Auth::guard('admin')->logout();
    } elseif (auth('student')->check()) {
        Auth::guard('student')->logout();
    } elseif (auth('department')->check()) {
        Auth::guard('department')->logout();
    }

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');

})->name('logout');

Route::get('/admin/clearance', [ClearanceController::class, 'index'])->name('admin.clearance');

Route::post('/admin/clearance/{id}/approve', [ClearanceController::class, 'approve'])->name('clearance.approve');

Route::post('/admin/clearance/{id}/reject', [ClearanceController::class, 'reject'])->name('clearance.reject');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

# admin Route

Route::get('admin/logout',[AdminController::class,'AdminLogout'])->name('admin-logout');


# admin route group and prefix
Route::prefix('admin')->group(function () {
    // Admin Dashboard Route
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin-dashboard');

    // Admin profile
      Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin-profile');
      Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin-profile-store');

      Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin-change-password');
      Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin-update-password');

      
});

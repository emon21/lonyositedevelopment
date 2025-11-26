<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {

    return view('frontend/index');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('backend/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

# =========== Admin Route List =========== #

# Admin Login
Route::post('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin Logout
Route::post('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin-logout');


# Verification User
Route::get('/verify', [AdminController::class, 'VerificationUser'])->name('custom.verification.user');
# Verification Verify
Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');

# admin Profile route with prefix
// Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin/profile');
    // Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin/profile/store');

    // Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin/change/password');
    // Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin/update/password');

    // Admin Profile
    Route::get('/profile', [AdminController::class, 'Profile'])->name('profile');
    Route::post('/profile/update', [AdminController::class, 'ProfileUpdate'])->name('profile.update');

    // password update
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

});





# =========== Admin Route List =========== #

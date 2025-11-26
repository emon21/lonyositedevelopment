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

require __DIR__.'/auth.php';


// Admin Logout
Route::post('admin/logout',[AdminController::class,'AdminLogout'])->name('admin-logout');

Route::post('admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');

# Verification User
Route::get('/verify',[AdminController::class,'VerificationUser'])->name('custom.verification.user');
# Verification Verify
Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');

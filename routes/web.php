<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', function () {

    return view('frontend/index');

});


# ===============  Frontend Route =============== #

# route group
// Route::prefix('user')->middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('frontend/user/dashboard');
//     })->name('user.dashboard');

//     Route::get('/profile', function () {
//         return view('frontend/user/profile');
//     })->name('user.profile');

// });

// Route::get('/',[FrontendController::class,'index'])->name('home');

// about
Route::get('about-us',[FrontendController::class,'about'])->name('about');

//team
Route::get('team',[FrontendController::class,'team'])->name('team');
//service
Route::get('service',[FrontendController::class,'service'])->name('service');
//portfolio
Route::get('portfolio',[FrontendController::class,'portfolio'])->name('portfolio');
// blog route
Route::get('blog',[FrontendController::class,'blog'])->name('blog');
//career
Route::get('career',[FrontendController::class,'career'])->name('career');
// contact
Route::get('contact-us',[FrontendController::class,'contact'])->name('contact');


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

    # Review
    // Route::get('/review', [ReviewController::class, 'index'])->name('review');

    Route::controller(ReviewController::class)->group(function () {
        Route::get('/review', 'index')->name('review.index');
        Route::get('/review/create', 'create')->name('review.create');
        Route::post('/review', 'store')->name('review.store');
        Route::get('/review/{review}', 'show')->name('review.show');
        Route::get('/review/{review}/edit', 'edit')->name('review.edit');
        Route::put('/review/{review}', 'update')->name('review.update');
        Route::delete('/review/{review}', 'destroy')->name('review.destroy');
    });
    

});


# =========== Admin Route List =========== #

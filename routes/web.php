<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FeatureListController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ClarifiController;
use App\Http\Controllers\admin\FeatureController;
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
Route::get('about-us', [FrontendController::class, 'about'])->name('about');

//team
Route::get('team', [FrontendController::class, 'team'])->name('team');
//service
Route::get('service', [FrontendController::class, 'service'])->name('service');
//portfolio
Route::get('portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
// blog route
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
//career
Route::get('career', [FrontendController::class, 'career'])->name('career');
// contact
Route::get('contact-us', [FrontendController::class, 'contact'])->name('contact');


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

    # Slider 
    Route::controller(SliderController::class)->group(function () {
        Route::get('/slider', 'index')->name('slider.index');
        Route::get('/slider/create', 'create')->name('slider.create');
        Route::post('/slider', 'store')->name('slider.store');
        Route::get('/slider/{slider}', 'show')->name('slider.show');
        Route::get('/slider/{slider}/edit', 'edit')->name('slider.edit');
        Route::put('/slider/{slider}', 'update')->name('slider.update');
        Route::delete('/slider/{slider}', 'destroy')->name('slider.destroy');

        // frontend slider Edit
        Route::post('/edit-slider/{id}', 'EditSlider');
        //fronten all Site Title Edit
        Route::post('/edit-siteTitle/{id}', 'EditSiteTitle');
    });


    # Feature
    Route::controller(FeatureController::class)->group(function () {

        Route::get('/feature', 'index')->name('feature.index');
        Route::get('/feature/create', 'create')->name('feature.create');
        Route::post('/feature', 'store')->name('feature.store');
        Route::get('/feature/{feature}', 'show')->name('feature.show');
        Route::get('/feature/{feature}/edit', 'edit')->name('feature.edit');
        Route::put('/feature/{feature}', 'update')->name('feature.update');
        Route::delete('/feature/{feature}', 'destroy')->name('feature.destroy');

        // Duplicate        
        Route::post('/feature/duplicate/{id}','duplicate')->name('feature.duplicate');

        // Restore
        Route::get('/feature-restore','DataRestore')->name('feature.restore');

    });


    # Clarifi
    // Route::controller(ClarifiController::class)->group(function () {

    //     Route::get('/clarifi', 'index')->name('clarifi.index');
    //     Route::get('/clarifi/create', 'create')->name('clarifi.create');
    //     Route::post('/clarifi', 'store')->name('clarifi.store');
    //     Route::get('/clarifi/{clarifi}', 'show')->name('clarifi.show');
    //     Route::get('/clarifi/{clarifi}/edit', 'edit')->name('clarifi.edit');
    //     Route::put('/clarifi/{clarifi}', 'update')->name('clarifi.update');
    //     Route::delete('/clarifi/{clarifi}', 'destroy')->name('clarifi.destroy');
 
    // });
    
    Route::controller(HomeController::class)->group(function () {

        Route::get('/clarifi', 'Getclarifis')->name('clarifi.index');
        Route::put('/clarifi/{id}', 'UpdateClarifi')->name('clarifi.update');

        
    });

    // financial
    Route::get('/financial', [HomeController::class, 'Financial'])->name('financial');
    Route::post('/financial/update-field', [HomeController::class, 'UpdateFinancial'])->name('financial.update');

    // usability

    Route::controller(HomeController::class)->group(function () {

        Route::get('/usability', 'GetUsability')->name('get.usability');
        Route::put('/usability/{id}', 'UpdateUsability')->name('usability.update');

        //Usability Connect
        Route::get('/usability/connect', 'UsabilityConnect')->name('usability-connect');
        Route::get('/usability-connect/create', 'UsabilityConnectCreate')->name('usability-connect.create');
        
        Route::post('/usability-connect/store', 'UsabilityConnectStore')->name('usability-connect.store');

        // edit
        Route::get('/usability-connect/{id}/edit', 'UsabilityConnectEdit')->name('usability-connect.edit');

        //update
        Route::put('/usability-connect/{id}', 'UsabilityConnectUpdate')->name('usability-connect.update');

        // frontend update route
        Route::post('/usability-connect/update-field', [HomeController::class, 'UpdateUsabilityConnect'])->name('usability-connect.update');

        // delete
        Route::delete('/usability-connect/{id}', 'UsabilityConnectDelete')->name('usability-connect.destroy');

    });


    # Answer
    Route::controller(HomeController::class)->group(function () {

        // answer
         Route::get('/answer', 'answer')->name('answer');

         Route::get('/answer/create', 'CreateAnswer')->name('answer.create');
         Route::post('/answer/store', 'StoreAnswer')->name('answer.store');

         Route::get('/answer/edit/{id}', 'EditAnswer')->name('answer.edit');
         //update
         Route::put('/answer/update/{id}', 'UpdateAnswer')->name('answer.update');
         // delete
         Route::delete('/answer/delete/{id}', 'DestroyAnswer')->name('answer.destroy');


    });

    # Apps Route
    Route::controller(HomeController::class)->group(function () {

        // apps
        //  Route::get('/apps', 'apps')->name('apps');

        //  Route::get('/apps/create', 'CreateApp')->name('apps.create');
        //  Route::post('/apps/store', 'StoreApp')->name('apps.store');

        //  Route::get('/apps/edit/{id}', 'EditApp')->name('apps.edit');
        //  //update
        //  Route::put('/apps/update/{id}', 'UpdateApp')->name('apps.update');
        //  // delete
        //  Route::delete('/apps/delete/{id}', 'DestroyApp')->name('apps.destroy');

         // get
        Route::get('/apps', 'AllApp')->name('apps');

         Route::post('/apps/update-apps', 'UpdateApps')->name('apps.update-apps');

        //  Route::post('/apps/update-apps-image/{id}', 'UpdateAppsImage')->name('apps.update.image');
         Route::post('/apps/update-apps-image/{id}', 'updateImage')->name('apps.update-image');

 
        });

});




# =========== Admin Route List =========== #



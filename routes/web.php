<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FeatureListController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ClarifiController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\admin\BlogCategoryController;

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

// All Category route       
Route::get('category', [FrontendController::class, 'category'])->name('category');

//Single category of blog
Route::get('/category/{category:category_slug}', [FrontendController::class, 'CategoryPosts'])
    ->name('category.posts');

// blog route       
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
//single blog

Route::get('blog/single-blog/{blog:slug}', [FrontendController::class, 'SingleBlog'])->name('single-blog');

// Blog with comment
Route::post('/comment/store', [FrontendController::class, 'CommentStore'])->name('comment.store');
Route::post('/comment/reply', [FrontendController::class, 'CommentReply'])->middleware(['auth'])->name('comment.reply');
Route::post('/admin/reply/store', [FrontendController::class, 'AdminReply'])->name('admin.reply.store');


// web.php
Route::get('/comment/{id}/edit', [FrontendController::class, 'EditComment'])->name('comment.edit');
Route::put('/comment/{id}', [FrontendController::class, 'UpdateComment'])->name('comment.update');


Route::delete('comment-reply-remove/{comment}', [FrontendController::class, 'CommentRemove'])->name('comment-reply-remove');

//career
Route::get('career', [FrontendController::class, 'career'])->name('career');

// contact
Route::get('contact-us', [FrontendController::class, 'contact'])->name('contact');

// contact store
Route::post('contact-us/message', [FrontendController::class, 'ContactMessage'])->name('contact.message');

// all Contact List
Route::get('contact/all/message', [FrontendController::class, 'ContactAllMessage'])->name('contact.all.message');
Route::post('message/read/{id}', [FrontendController::class, 'markAsRead']);


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
        Route::post('/feature/duplicate/{id}', 'duplicate')->name('feature.duplicate');

        // Restore
        Route::get('/feature-restore', 'DataRestore')->name('feature.restore');
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


    # Our Team

    Route::controller(TeamController::class)->group(function () {

        // team
        Route::get('/team', 'index')->name('team');

        Route::get('/team/create', 'create')->name('team.create');
        Route::post('/team/store', 'store')->name('team.store');

        Route::get('/team/edit/{team}', 'edit')->name('team.edit');
        //update
        Route::put('/team/update/{team}', 'update')->name('team.update');
        // delete
        Route::delete('/team/delete/{team}', 'destroy')->name('team.destroy');
    });


    # About Get Route

    // Route::get('/about', [AboutController::class, 'index'])->name('get.about');


    // Route::get('/about', [AboutController::class, 'index'])->name('about');
    // Route::get('/about/edit/{about}', [AboutController::class, 'edit'])->name('about.edit');
    // Route::put('/about/update/{about}', [AboutController::class, 'update'])->name('about.update');

    Route::controller(FrontendController::class)->group(function () {

        Route::get('/get/about',  'GetAboutUs')->name('get.about');
        Route::put('/about/update/{about}',  'UpdateAbout')->name('about.update');
    });


    # Category Route

    Route::controller(BlogCategoryController::class)->group(function () {

        // category route list
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::put('/category/update/{id}', 'update')->name('category.update');
        Route::delete('/category/delete/{id}', 'destroy')->name('category.destroy');
        Route::get('/category/show/{category}', 'show')->name('category.show');
    });

    # BLog Route
    Route::controller(BlogController::class)->group(function () {

        // blog route list
        Route::get('/blog', 'index')->name('blog');
        Route::get('/blog/create', 'create')->name('blog.create');
        Route::post('/blog/store', 'store')->name('blog.store');
        Route::get('/blog/edit/{blog}', 'edit')->name('blog.edit');
        Route::put('/blog/update/{blog}', 'update')->name('blog.update');
        Route::delete('/blog/delete/{blog}', 'destroy')->name('blog.destroy');

        Route::get('/blog/show/{blog}', 'show')->name('blog.show');
    });

    # Website Setting Route
    // Route::get('website-setting', [AdminController::class, 'WebsiteSetting'])->name('website');

    Route::controller(SettingsController::class)->group(function () {

        
      
        Route::get('/settings',  'index')->name('settings.index');
        // Route::post('/settings/update', 'update')->name('settings.update');

        // web site setting update route 
        Route::post('/settings/update', 'UpdateSetting')->name('settings.update');

        // rest setting
        Route::get('settings/reset', 
         'ResetSetting')
            ->name('settings.reset');

        // mail testing
        Route::post('/mail-settings/test', 'testMail')
            ->name('mail.settings.test');

        // maintenance mode 
        // Route::middleware(['auth', 'admin'])->group(function () {
        //     Route::post('/admin/maintenance',  'toggle')
        //         ->name('maintenance.toggle');
        // });

        Route::post('/maintenance',  'toggle')
            ->name('maintenance.toggle');
            
            // Route::post('/maintenance',  'ChangeMode')
            // ->name('maintenance.toggle');

        # full Site upload File Delete or Clear
        Route::get('site/file-clear','UploadFileClear')->name('site.file.clear');   

    });

    Route::get('/language/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'bn'])) {
            session(['locale' => $locale]);
            App::setLocale($locale);

            if (request()->wantsJson() || request()->ajax()) {
                return response()->json(['status' => 'success']);
            }
        }

        return redirect()->back();
    })->name('language.switch');

});

// out of any middleware


# =========== Admin Route List =========== #


# =========== Frontend Route List =========== #

// Route::middleware(['auth'])->group(function () {

// });



Route::get('team', [FrontendController::class, 'Team'])->name('team');
Route::get('single-team/{team}', [FrontendController::class, 'SingleTeam'])->name('single.team');


# =========== Frontend Route List =========== #


// Route::post('/language', function () {
//     $locale = request('site_language');

//     // শুধু valid languages allow করুন
//     if (in_array($locale, ['en', 'bn'])) {
//         session(['locale' => $locale]); // middleware session
//     }

//     return redirect()->back();
// })->name('language.switch');

// Route::get('/language/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'bn'])) {
//         session(['locale' => $locale]);
//         // AJAX request হলে JSON return করুন
//         if (request()->ajax()) {
//             return response()->json(['status' => 'success']);
//         }
//     }
//     return redirect()->back();
// })->name('language.switch');


// Route::get('/language/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'bn'])) {
//         session(['locale' => $locale]);
//         App::setLocale($locale);

//         if (request()->wantsJson() || request()->ajax()) {
//             return response()->json(['status' => 'success']);
//         }
//     }

//     return redirect()->back();
// })->name('language.switch');


// Route::get('/language/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'bn'])) {
//         session(['locale' => $locale]);
//         App::setLocale($locale);

//         if (request()->wantsJson() || request()->ajax()) {
//             return response()->json(['status' => 'success']);
//         }
//     }

//     return redirect()->back();
// })->name('language.switch');


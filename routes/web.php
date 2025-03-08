<?php

use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ExhibitionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LinkCategoryController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\LinkStatisticController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\VisitorLogin;
use App\Http\Livewire\VisitorDashboard;
use App\Http\Controllers\VisitorAuthController;
use App\Http\Controllers\FileDownloadController;

Route::post('/visitor/login', [VisitorAuthController::class, 'login'])->name('visitor.login');
// Route::get('/visitor/dashboard', function () {
//     return view('visitor.dashboard');
// })->name('visitor.dashboard');

Route::get('/visitor/login', VisitorLogin::class)->name('visitor.login');
Route::get('/visitor/dashboard', VisitorDashboard::class)->middleware('visitor.auth')->name('visitor.dashboard');
// Route::get('/visitor/download/{media}', [LinkController::class, 'download'])->name('links.download');

Route::get('/visitor/links', function () {
    return view('links'); // Your existing Links Page
})->middleware('visitor.auth')->name('visitor.links');

Route::redirect('/', '/login');

Auth::routes();

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Exhibition
    Route::resource('exhibitions', ExhibitionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Link Category
    Route::post('link-categories/media', [LinkCategoryController::class, 'storeMedia'])->name('link-categories.storeMedia');
    Route::resource('link-categories', LinkCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Link
    Route::post('links/media', [LinkController::class, 'storeMedia'])->name('links.storeMedia');
    Route::resource('links', LinkController::class, ['except' => ['store', 'update', 'destroy']]);

    // Country
    Route::post('countries/media', [CountryController::class, 'storeMedia'])->name('countries.storeMedia');
    Route::resource('countries', CountryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Visitor
    Route::resource('visitors', VisitorController::class, ['except' => ['store', 'update', 'destroy']]);
    // Link Statistic
    Route::resource('link-statistics', LinkStatisticController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});

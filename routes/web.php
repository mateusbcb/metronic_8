<?php

use App\Http\Controllers\Admin\Apps\PermissionManagementController;
use App\Http\Controllers\Admin\Apps\RoleManagementController;
use App\Http\Controllers\Admin\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Site\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('admin')->group(function () {
        Route::name('admin_user_management.')->group(function () {
            Route::resource('/user_management/users', UserManagementController::class);
            Route::resource('/user_management/roles', RoleManagementController::class);
            Route::resource('/user_management/permissions', PermissionManagementController::class);
        });
    });


});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

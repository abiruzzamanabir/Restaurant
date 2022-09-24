<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\FeaturedPostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Frontend\SettingController;
use App\Http\Controllers\ReservationController;

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

Route::group(['middleware' => 'admin.redirect'], function () {
    Route::get('/admin-login', [AdminAuthController::class, 'showLoginPage'])->name('admin.login.page');
    Route::post('/admin-login', [AdminAuthController::class, 'Login'])->name('admin.login');
    Route::get('/forget-password', [AdminProfileController::class, 'ShowForgetPasswordPage'])->name('forget.password.page');
    Route::post('/forget-password', [AdminProfileController::class, 'ForgetPassword'])->name('forget.password');
    Route::get('/reset-password/{token?}/{email?}', [AdminProfileController::class, 'ResetPasswordLink'])->name('reset.password.page');
    Route::post('/reset-password/', [AdminProfileController::class, 'ResetPassword'])->name('reset.password');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminPageController::class, 'showDashboardPage'])->name('admin.dashboard.page');
    Route::get('/profile', [AdminPageController::class, 'showProfilePage'])->name('admin.profile.page');
    Route::post('/profile', [AdminPageController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/profile-password', [AdminPageController::class, 'updatePassword'])->name('admin.password.update');
    Route::get('/admin-logout', [AdminAuthController::class, 'Logout'])->name('admin.logout.page');
    Route::resource('/permission', AdminPermissionController::class);
    Route::resource('/role', AdminRoleController::class);
    Route::resource('/admin-user', AdminController::class);
    Route::get('/admin-user-status-update/{id}', [AdminController::class, 'updateStatus'])->name('admin.status.update');
    Route::get('/admin-user-trash-update/{id}', [AdminController::class, 'updateTrash'])->name('admin.trash.update');
    Route::get('/admin-trash', [AdminController::class, 'trashUsers'])->name('admin.trash');
    Route::resource('/slider', SliderController::class);
    Route::get('/slider-status-update/{id}', [SliderController::class, 'updateStatus'])->name('slider.status.update');
    Route::resource('/featured-post', FeaturedPostController::class);
    Route::get('/featured-post-status-update/{id}', [FeaturedPostController::class, 'updateStatus'])->name('featured.post.status.update');
    Route::resource('/menu', MenuController::class);
    Route::get('/menu-status-update/{id}', [MenuController::class, 'updateStatus'])->name('menu.status.update');
    Route::resource('/team-member', TeamController::class);
    Route::get('/team-member-status-update/{id}', [TeamController::class, 'updateStatus'])->name('team.member.status.update');
    Route::resource('/gallery', GalleryController::class);
    Route::get('/gallery-status-update/{id}', [GalleryController::class, 'updateStatus'])->name('gallery.status.update');
    Route::get('/reserve-update/{id}', [ReservationController::class, 'updateToReserved'])->name('reserve.update');
    Route::get('/cancel-update/{id}', [ReservationController::class, 'updateToCancel'])->name('cancel.update');
    Route::resource('/setting', SettingController::class);

    

});


Route::get('/', [FrontendController::class, 'showHomePage'])->name('home.page');
Route::get('/menu-item', [FrontendController::class, 'showMenuPage'])->name('menu.page');
Route::get('/staff', [FrontendController::class, 'showTeamPage'])->name('team.page');
Route::get('/gallery-item', [FrontendController::class, 'showGalleryPage'])->name('gallery.page');
Route::get('/reservation', [FrontendController::class, 'showReservationPage'])->name('reservation.page');
Route::post('/reservation-submit', [ReservationController::class, 'store'])->name('reservation.store');

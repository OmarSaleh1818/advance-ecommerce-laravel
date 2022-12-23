<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Home\IndexController;

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

/* ------------- Admin Route --------------- */

Route::prefix('admin')->group(function() {

    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');


    Route::get('/dashboard',[AdminController::class, 'Dashboard'])
    ->name('admin.dashboard')->middleware('admin');

    Route::get('/admin/logout',[AdminController::class, 'AdminLogout'])
    ->name('admin.logout')->middleware('admin');

    Route::get('/register/owner',[AdminController::class, 'AdminRegister'])->name('admin.register');

    Route::post('/register/create',[AdminController::class, 'RegisterCreate'])->name('admin.register.create');

    Route::get('/admin/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

    Route::get('/admin/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    Route::post('/admin/profile/store',[AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password',[AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password',[AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});





/* ------------- End Admin Route -------------*/



/* ------------- All User Route -------------*/
Route::controller(IndexController::class)->group(function() {
    
    Route::get('/','Index');
    Route::get('/user/logout', 'UserLogout')->name('user.logout');
    Route::get('/user/profile', 'UserProfile')->name('user.profile');
    Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/user/password/update', 'UserPasswordUpdate')->name('user.password.update');


});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

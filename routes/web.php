<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('site.home.index');
});

// Trasy widoków
Route::get('login', [ViewController::class, 'showLoginForm'])->name('login');
Route::get('password/reset', [ViewController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

// Trasy logowania
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Trasy zapomnianego hasła
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');



Route::group(['middleware' => ['role:admin,super_admin,author']], function () {
    Route::get('/panel-admin', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/panel-admin/articles', [AdminController::class, 'articles'])->name('admin.articles');
    Route::get('/panel-admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/panel-admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
    Route::get('/panel-admin/users', [AdminController::class, 'users'])->name('admin.users');
});


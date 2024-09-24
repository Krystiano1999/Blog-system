<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ViewController;

// Strona główna
Route::get('/', function () {
    return view('site.home.index');
});

// Trasy uwierzytelniania
Route::get('login', [ViewController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Trasy resetowania hasła
Route::get('password/reset', [ViewController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Trasy panelu administracyjnego z middleware
Route::group(['middleware' => ['role:admin,super_admin,author']], function () {
    Route::get('/panel-admin', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/panel-admin/articles', [AdminController::class, 'showArticle'])->name('admin.articles');
    Route::get('/panel-admin/categories', [AdminController::class, 'showCategory'])->name('admin.categories');
    Route::get('/panel-admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
    Route::get('/panel-admin/users', [AdminController::class, 'showUser'])->name('admin.users');
});





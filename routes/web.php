<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminViewController;
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
    Route::get('/panel-admin', [AdminViewController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/panel-admin/articles', [AdminViewController::class, 'showArticle'])->name('admin.articles');
    Route::get('/panel-admin/categories', [AdminViewController::class, 'showCategory'])->name('admin.categories');
    Route::get('/panel-admin/comments', [AdminViewController::class, 'showComments'])->name('admin.comments');  
    Route::get('/panel-admin/users', [AdminViewController::class, 'showUser'])->name('admin.users');

    // Trasy do zarządzania użytkownikami
    Route::post('/panel-admin/users', [UserManagementController::class, 'store'])->name('admin.users.store');
    Route::put('/panel-admin/users/{user}', [UserManagementController::class, 'update'])->name('admin.users.update');
    Route::delete('/panel-admin/users/{user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

    // Trasy do zarządzania artykułami
    Route::get('articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('articles/{article}', [ArticleController::class, 'show'])->name('admin.articles.show');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

});


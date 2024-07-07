<?php
use App\Http\Controllers\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\UserTypeMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['guest', PreventBackHistory::class])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});


Route::middleware([AdminMiddleware::class, PreventBackHistory::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});


Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/adminprofile', [AdminController::class, 'index'])->name('adminprofile');
    Route::get('/userprofile', [UserController::class, 'userprofile'])->name('userprofile');
});


<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('/', [DashboardController::class, 'home'])->name('home');

# AUTH
Route::get('auth/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('auth/login2', [AuthController::class, 'loginForm'])->name('login2');
Route::post('auth/login', [AuthController::class, 'login'])->name('login-post');
Route::get('auth/send-email-verification', [AuthController::class, 'verificationForm'])->name('send-email-verification');
Route::post('auth/verification', [AuthController::class, 'sendEmailVerification']);
Route::get('auth/verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::get('auth/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('auth/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('forgot-password');
Route::post('auth/forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('auth/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('reset-password');
Route::post('auth/reset-password/{token}', [AuthController::class, 'resetPassword']);

# SOCIAL LOGIN AND REGISTER
Route::get('auth/social-login/{provider}', [AuthController::class, 'socialLogin'])->name('social-login');
Route::get('auth/social-register/{provider}', [AuthController::class, 'socialRegister'])->name('social-register');
Route::get('auth/social/{provider}/callback', [AuthController::class, 'socialCallback'])->name('social-callback');

# CRUD GENERATOR
Route::get('crud-generator', [CrudController::class, 'index']);
Route::post('crud-generator', [CrudController::class, 'generateJson']);

# YOUTUBE
Route::get('youtube/view-sync', [YoutubeController::class, 'viewSync'])->name('youtube.view-sync');

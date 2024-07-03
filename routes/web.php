<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
    Route::get('/login', [AuthManager::class, 'login'])->name('login');
    Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
    Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
    Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
    Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

    Route::get('/profile', [AuthManager::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [AuthManager::class, 'edit'])->name('editProfile');
    Route::put('/profile/edit', [AuthManager::class, 'update'])->name('editProfile.update');

    Route::get('/profile/changePassword', [AuthManager::class, 'showChangePasswordForm'])->name('changePassword');
    Route::post('/profile/changePassword', [AuthManager::class, 'changePassword'])->name('password.update');




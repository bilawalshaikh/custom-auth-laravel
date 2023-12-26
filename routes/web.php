<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/dashboard', function () {
    return view('users.dashboard');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.submit');


Route::post('/dashboard', [AuthController::class, 'logout'])->name('logout');


Route::get('/forgot-password',
 [AuthController::class, 'showForgotPasswordForm'])
    ->name('forgot-password');

    Route::post('/forgot-password', 
    [AuthController::class, 'sendResetLink'])
        ->name('forgot-password.email');


Route::get('/reset-password/{token}',
[AuthController::class, 'resetPassword'])
->name('reset.password');
       
Route::post('/reset-password',
[AuthController::class, 'resetPasswordPost'])
->name('reset.password.post');
       
        




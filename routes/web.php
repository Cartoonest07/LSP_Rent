<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReturnController;


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

// Init Routes
Route::get('/', [AuthController::class, 'viewLogin'])->name('viewLogin');
Route::post('/loginattempt', [AuthController::class, 'login'])->name('login');;

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//User
Route::group(['middleware' => 'customer'], function () {
    
    Route::get('/user/profile', [UserController::class, 'showProfileForm'])->name('showProfileForm');
    
    Route::get('/user/edit', [UserController::class, 'editProfileForm'])->name('editProfileForm');

    Route::post('/user/edit', [UserController::class, 'editProfileUpdate'])->name('editProfileUpdate');
    

    
});

//Admin
Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('showDashboard');
    Route::get('/instruments', [AdminController::class, 'listInstruments'])->name('instruments.index');
    
    // Rute untuk menampilkan form penambahan instrumen
    Route::get('/instruments/create', [AdminController::class, 'createInstrument'])->name('instruments.create');

    // Rute untuk menampilkan detail instrumen
    Route::get('/instruments/{instrument}', [AdminController::class, 'showInstrument'])->name('instruments.show');

// Rute untuk menyimpan instrumen baru
    Route::post('/instruments', [AdminController::class, 'storeInstrument'])->name('instruments.store');

// Rute untuk menghapus instrumen
    Route::delete('/instruments/{instrument}', [AdminController::class, 'deleteInstrument'])->name('instruments.delete');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('/users/{user}/history', [UserController::class, 'showHistory'])->name('users.history');

    Route::get('/return/create', [ReturnController::class, 'create'])->name('return.create');
    Route::post('/return', [ReturnController::class, 'store'])->name('return.store');

    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');



    
});

// Homepage Routes
Route::get('/homepage', [AuthController::class, 'showHomepageForm'])->name('homepage');
Route::post('/homepage', [AuthController::class, 'homepage']);

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Forget Password Routes
Route::get('/forget', [AuthController::class, 'showForgetPasswordForm'])->name('forget');
Route::post('/forget', [AuthController::class, 'forget']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceBookingController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('index');
})->name('index');


Route::post('/get-available-times', [ServiceBookingController::class, 'getAvailableTimes'])->name('get.available.times');
Route::post('/book-service', [ServiceBookingController::class, 'store'])->name('book.service');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/parts', function () {
    return view('parts');
})->name('parts');



Route::get('/team', function () {
    return view('team');
})->name('team');


Route::get('/', [HomeController::class, 'index']);
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Dashboard Routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');
Route::get('/admin/records', function () {
    return view('admin.records');
})->middleware('auth');

Route::get('/user', function () {
    return view('user');
})->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/admin/dashboard', [ServiceBookingController::class, 'showBookings']);
Route::get('/admin/records', [ServiceBookingController::class, 'showRecords']);
Route::get('/account', function () {
    return view('account');
})->middleware('auth');
Route::get('/appointments', function () {
    return view('appointments');
})->middleware('auth');

Route::get('/account', [AuthController::class, 'account'])->middleware('auth');
Route::get('/appointments', [AuthController::class, 'appointments'])->middleware('auth');
Route::get('/admin/dashboard', [ServiceBookingController::class, 'appointments'])->name('admin.dashboard');
Route::get('/admin/records', [ServiceBookingController::class, 'appointment'])->name('admin.records');
use App\Http\Controllers\PasswordResetController;

Route::get('/password/email', [PasswordResetController::class, 'showEmailForm']);
Route::post('/password/reset', [PasswordResetController::class, 'sendResetLink']);

Route::get('/password/new', [PasswordResetController::class, 'showNewPasswordForm']);
Route::post('/password/update', [PasswordResetController::class, 'updatePassword']);

// routes/web.php
Route::delete('/cancel-appointment/{id}', [AuthController::class, 'cancelAppointment'])->name('cancel.appointment');
Route::get('/adminlogin', function () {
    return view('adminlogin');
})->name('login');


Route::get('/adminlogin', [AuthController::class, 'adminshowLogin']);
Route::post('/login', [AuthController::class, 'adminlogin']);

use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');




use App\Http\Controllers\FeedbackController;

Route::get('/', [FeedbackController::class, 'index']); // For home page


Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

use App\Http\Controllers\ServiceController;


Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/user', [ServiceController::class, 'dashboard'])->middleware('auth')->name('user.dashboard');

// Route::get('/', [ServiceController::class, 'index'])->name('services.index');

Route::get('/service', function () {
    return view('services');
})->name('serices');
// Admin/Manage Services
Route::get('/services/manage', [ServiceController::class, 'manage'])->name('services.manage');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/', [FeedbackController::class, 'dashboard'])->name('index.dashboard');
Route::get('/service', [FeedbackController::class, 'dash'])->name('services.dashboard');

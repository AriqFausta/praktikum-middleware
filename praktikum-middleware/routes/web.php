<?php

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

use Illuminate\Support\Facades\Redirect;

// Redirect root to login page so visiting `/` shows the login form
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/about', function () {
    return view('about');
});

use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class,
'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class,
'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class,
'register']);
Route::post('/logout', [AuthController::class,
'logout'])->name('logout');

Route::get('/hello', function () {
    return 'Hello, World!';
});

use App\Http\Controllers\JobController;
Route::get('/jobs', [JobController::class, 'index']);

Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth']);

Route::get('/admin', function () {
    return 'Welcome to the admin panel.';
})->middleware(['auth', 'isAdmin']);
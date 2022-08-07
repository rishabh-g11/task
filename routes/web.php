<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Middleware\CheckUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::group(['prefix' => 'admin'], function(){  
Route::get('/registration', [AdminController::class, 'adminRegister'])->name('admin.register');
Route::get('/login', [AdminController::class, 'adminlogin'])->name('admin.login');
Route::post('post-registration', [AdminController::class, 'postRegistration'])->name('admin.register.post');
Route::post('post-login', [AdminController::class, 'postLogin'])->name('admin.login.post');

});


// Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

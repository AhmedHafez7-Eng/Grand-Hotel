<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

//admin routes
Route::get('/show_users', [AdminController::class, 'show_users']);
Route::get('/add_doctor', [AdminController::class, 'addDoctor'])->middleware(['auth'])->middleware('admin');
Route::post('/add_doctor', [AdminController::class, 'createDoctor'])->middleware(['auth'])->middleware('admin');
Route::get('/updateDoctor/{id}', [AdminController::class, 'updateDoctor'])->middleware(['auth'])->middleware('admin');
Route::put('/edit_doctor/{id}', [AdminController::class, 'edit_doctor'])->middleware(['auth'])->middleware('admin');
Route::delete('/deleteDoctor/{id}', [AdminController::class, 'deleteDoctor'])->middleware(['auth'])->middleware('admin');

Route::get('/show_appointments', [AdminController::class, 'show_appointments'])->middleware(['auth'])->middleware('admin');
Route::get('/canceled/{id}', [AdminController::class, 'canceled'])->middleware(['auth'])->middleware('admin');
Route::get('/approved/{id}', [AdminController::class, 'approved'])->middleware(['auth'])->middleware('admin');


Route::get('/emailNotify/{id}', [AdminController::class, 'emailNotify'])->middleware(['auth'])->middleware('admin');
Route::post('/sendEmail/{id}', [AdminController::class, 'sendEmail'])->middleware(['auth'])->middleware('admin');

//====================== Redirection Routes [HomeController]
Route::get('/', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth', 'verified']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth']);













Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

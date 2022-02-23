<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//====================== Redirection Routes [HomeController]
Route::get('/', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth', 'verified']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth']);


//====================== Admin Routes [AdminController]
Route::get('/show_managers', [AdminController::class, 'show_managers'])->middleware(['auth'])->middleware('admin');
Route::get('/add_manager', [AdminController::class, 'addManager'])->middleware(['auth'])->middleware('admin');
Route::post('/add_manager', [AdminController::class, 'createManager'])->middleware(['auth'])->middleware('admin');
Route::get('/updateManager/{id}', [AdminController::class, 'updateManager'])->middleware(['auth'])->middleware('admin');
Route::put('/edit_manager/{id}', [AdminController::class, 'edit_manager'])->middleware(['auth'])->middleware('admin');
Route::delete('/deleteManager/{id}', [AdminController::class, 'deleteManager'])->middleware(['auth'])->middleware('admin');
Route::get('/banned/{id}', [AdminController::class, 'banned'])->middleware(['auth'])->middleware('admin');



// Route::get('/emailNotify/{id}', [AdminController::class, 'emailNotify'])->middleware(['auth'])->middleware('admin');
// Route::post('/sendEmail/{id}', [AdminController::class, 'sendEmail'])->middleware(['auth'])->middleware('admin');






//====================== Auth Routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
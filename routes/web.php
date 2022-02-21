<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\reciptionController;
=======

use App\Http\Controllers\reciptionController;


use App\Http\Controllers\HomeController;


>>>>>>> ae46038a78534a97ed4d291e3c7c5add7642dce7
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

<<<<<<< HEAD
=======

>>>>>>> ae46038a78534a97ed4d291e3c7c5add7642dce7
Route::get('/', function () {
    return view('welcome');
});
Route::get('/getreservation',[reciptionController::class, 'showapproved','shownonapproved']);
<<<<<<< HEAD
=======
//====================== Redirection Routes [HomeController]
Route::get('/', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth', 'verified']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth']);













Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

>>>>>>> ae46038a78534a97ed4d291e3c7c5add7642dce7

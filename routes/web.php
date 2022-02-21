<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\reciptionController;

use App\Http\Livewire\ClickEvent;
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
Route::get('/click-event', ClickEvent::class);
Route::get('/getchange/{id}',[reciptionController::class,'change']);
Route::get('/getnonapproved',[reciptionController::class,'shownonapproved']);
Route::get('/getapproved',[reciptionController::class,'showapproved']);
Route::get('/getinprogress',[reciptionController::class, 'showinprogress']);
//====================== Redirection Routes [HomeController]
Route::get('/', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth', 'verified']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth']);













Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;

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
Route::get('/home', [HomeController::class, 'redirect'])
    ->name('home')
    ->middleware(['auth']);

Route::get('/manager', function () {
    return view('manager.home');
});
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::get('/showReceptionists', [
    ManagerController::class,
    'showResceptionists',
])->name('show_receptionists');
Route::get('/deleteReceptionist/{id}', [
    ManagerController::class,
    'deleteReceptionist',
]);
Route::get('/updateReceptionist/{id}', [
    ManagerController::class,
    'updateReceptionist',
]);
Route::get('/updateReceptionistSave', [
    ManagerController::class,
    'updateReceptionistSave',
])->name('receptionist.update');
Route::get('/ban/{id}', [ManagerController::class, 'ban']);
Route::get('/unban/{id}', [ManagerController::class, 'unBan']);

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
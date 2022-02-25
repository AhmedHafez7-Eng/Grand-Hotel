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
Route::get('/updateProfile/{id}', [HomeController::class, 'updateProfile'])->middleware(['auth']);
Route::put('/edit_profile/{id}', [HomeController::class, 'edit_profile'])->middleware(['auth']);
// ---------- Client Reservations
Route::post('/home/make_reservation', [HomeController::class, 'create_reservation'])->middleware(['auth']);
Route::get('/my_reservations/{id}', [HomeController::class, 'my_reservations'])->middleware(['auth']);
Route::delete('/cancel_reservation/{id}', [HomeController::class, 'cancel_reservation']);
//====================== Admin Routes [AdminController]
// ---------- For Managers
Route::get('/show_managers', [AdminController::class, 'show_managers'])->middleware(['auth'])->middleware('admin');
Route::get('/add_manager', [AdminController::class, 'addManager'])->middleware(['auth'])->middleware('admin');
Route::post('/add_manager', [AdminController::class, 'createManager'])->middleware(['auth'])->middleware('admin');
Route::get('/updateManager/{id}', [AdminController::class, 'updateManager'])->middleware(['auth'])->middleware('admin');
Route::put('/edit_manager/{id}', [AdminController::class, 'edit_manager'])->middleware(['auth'])->middleware('admin');
Route::delete('/deleteManager/{id}', [AdminController::class, 'deleteManager'])->middleware(['auth'])->middleware('admin');
Route::get('/banned/{id}', [AdminController::class, 'banned'])->middleware(['auth'])->middleware('admin');

// ---------- For Receptionists
Route::get('/show_receptionists', [AdminController::class, 'show_receptionists'])->middleware(['auth'])->middleware('admin');
Route::get('/add_receptionist', [AdminController::class, 'add_receptionist'])->middleware(['auth'])->middleware('admin');
Route::post('/add_receptionist', [AdminController::class, 'create_receptionist'])->middleware(['auth'])->middleware('admin');
Route::get('/update_receptionist/{id}', [AdminController::class, 'update_receptionist'])->middleware(['auth'])->middleware('admin');
Route::put('/edit_receptionist/{id}', [AdminController::class, 'edit_receptionist'])->middleware(['auth'])->middleware('admin');
Route::delete('/delete_receptionist/{id}', [AdminController::class, 'delete_receptionist'])->middleware(['auth'])->middleware('admin');
Route::get('/banned/{id}', [AdminController::class, 'banned'])->middleware(['auth'])->middleware('admin');

// ---------- For Floors
Route::get('/show_floors', [AdminController::class, 'show_floors'])->middleware(['auth'])->middleware('admin');
Route::post('/show_floors', [AdminController::class, 'create_floor'])->middleware(['auth'])->middleware('admin');
Route::get('/update_floor/{number}', [AdminController::class, 'update_floor'])->middleware(['auth'])->middleware('admin');
Route::put('/edit_floor/{number}', [AdminController::class, 'edit_floor'])->middleware(['auth'])->middleware('admin');
Route::delete('/delete_floor/{number}', [AdminController::class, 'delete_floor'])->middleware(['auth'])->middleware('admin');

// ---------- For Rooms
Route::get('/show_rooms', [AdminController::class, 'show_rooms'])->middleware(['auth'])->middleware('admin');
Route::post('/show_rooms', [AdminController::class, 'create_room'])->middleware(['auth'])->middleware('admin');
Route::get('/update_room/{number}', [AdminController::class, 'update_room'])->middleware(['auth'])->middleware('admin');
Route::put('/edit_room/{number}', [AdminController::class, 'edit_room'])->middleware(['auth'])->middleware('admin');
Route::delete('/delete_room/{number}', [AdminController::class, 'delete_room'])->middleware(['auth'])->middleware('admin');

// ---------- For Reservations
Route::get('/show_reservations', [AdminController::class, 'show_reservations'])->middleware(['auth'])->middleware('admin');
Route::post('/show_reservations', [AdminController::class, 'create_reservation'])->middleware(['auth'])->middleware('admin');
Route::get('/approve_reservation/{id}', [AdminController::class, 'approve_reservation'])->middleware(['auth'])->middleware('admin');
Route::delete('/cancel_reservation/{id}', [AdminController::class, 'cancel_reservation']);


//====================== Auth Routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\reciptionController;

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


Route::get('/receptionist', [reciptionController::class, 'showapproved'])
    ->name('receptionist')
    ->middleware(['auth'])
    ->middleware('receptionist');
Route::get('/updatereceptionist/{id}', [reciptionController::class, 'change'])
    ->name('change')
    ->middleware(['auth'])
    ->middleware('receptionist');

    //////////////////////////////////////////////////////////

    Route::get('/receptionistMan', [ManagerController::class, 'showapproved'])
    ->name('receptionistMan')
    ->middleware(['auth'])
    ->middleware('manager');
Route::get('/changeReceptionistMan/{id}', [ManagerController::class, 'change'])
    ->name('changeReceptionistMan')
    ->middleware(['auth'])
    ->middleware('manager');
        

//====================== Redirection Routes [HomeController]
Route::group(
    [
        'middleware' => ['auth:sanctum', 'verified'],
        'middleware' => ['manager'],
    ],
    function () {
        Route::get('/manager', function () {
            return view('manager.home');
        });
        Route::get('/room', [ManagerController::class, 'showRoom'])->name(
            'show_rooms'
        );
        Route::get('/deleteRoom/{number}', [
            ManagerController::class,
            'deleteRoom',
        ]);
        Route::get('/updateRoom/{RoomId}', [
            ManagerController::class,
            'updateRoom',
        ]);
        Route::get('/updateRoomSave', [
            ManagerController::class,
            'updateRoomSave',
        ])->name('room.update');
        Route::get('/createRoom', [ManagerController::class, 'createRoom']);
        Route::post('/createRoomSave', [
            ManagerController::class,
            'createRoomSave',
        ])->name('room.create');
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
        Route::get('/showFloors', [
            ManagerController::class,
            'showFloors',
        ])->name('show_floors');

        Route::get('/deleteFloor/{idf}', [
            ManagerController::class,
            'deleteFloor',
        ]);
        Route::get('/updateFloor/{idf}', [
            ManagerController::class,
            'updateFloor',
        ]);
        Route::get('/updateFloorSave', [
            ManagerController::class,
            'updateFloorSave',
        ])->name('floor.update');
        Route::get('/createFloor', [ManagerController::class, 'createFloor']);
        Route::get('/createFloorSave', [
            ManagerController::class,
            'createFloorSave',
        ])->name('floor.create');
    }
);
Route::get('/manager_add_receptionist', [ManagerController::class, 'add_receptionist'])->middleware(['auth'])->middleware('manager');
Route::post('/manager_add_receptionist', [ManagerController::class, 'create_receptionist'])->middleware(['auth'])->middleware('manager');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');
//====================== Redirection Routes [HomeController]
Route::get('/', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth', 'verified']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware(['auth']);
Route::get('/updateProfile/{id}', [HomeController::class, 'updateProfile'])->middleware(['auth']);
Route::put('/updateProfile/{id}', [HomeController::class, 'edit_profile'])->middleware(['auth']);
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

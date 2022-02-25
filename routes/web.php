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
Route::get('/home', [HomeController::class, 'redirect'])
    ->name('home')
    ->middleware(['auth']);
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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
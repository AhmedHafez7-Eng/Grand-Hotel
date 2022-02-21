<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

use App\Http\Controllers\HomeController;

=======
use App\Http\Controllers\reciptionController;
>>>>>>> 785a5f33de7458faa6acbb9f8b2f99eb043aa347
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
Route::get('/getreservation',[reciptionController::class, 'showapproved','shownonapproved']);

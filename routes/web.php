<?php

use App\Http\Controllers\Backend\BedController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\LabReportController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\PatientHistoryController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\RoomController;
use App\Models\Backend\BedBooking;
use App\Models\Backend\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/doctors',DoctorController::class);
Route::resource('/patients',PatientController::class);
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/patient-history/{patient_id}',[PatientHistoryController::class,'history'])->name('patient-history');
Route::get('/patient-history-create/{patient_id}', [PatientHistoryController::class, 'create'])->name('patient-history-create');
Route::post('/patient-history-store', [PatientHistoryController::class, 'store'])->name('patient-history.store');
Route::delete('/patient-history/{id}', [PatientHistoryController::class, 'destroy'])->name('patient-history-destory');

Route::get('/generate-lab-report',[LabReportController::class,'generateLabReport'])->name('generate.labReport');
Route::post('/lab-report', [LabReportController::class, 'getReport'])->name('getReport');
Route::resource('room',RoomController::class);
Route::resource('bed',BedController::class);
Route::get('/bed-booking',[BedController::class,'getBed'])->name('bed.booking');
Route::post('/bed-booking',[BedController::class,'bedBoking'])->name('bed.booking.store');
Route::get('/get_child_options/{parent_id}',[BedController::class,'getChild']);
Route::get('/user-reservations',[BedController::class,'getRerservations'])->name('bed.reservations');
Route::resource('review',ReviewController::class);
Route::resource('event',EventController::class);



// Route::get('history',PatientHistoryController::class);



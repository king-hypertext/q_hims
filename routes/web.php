<?php

use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\ChargesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\test\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/test', [TestController::class, 'test']);
Route::get('/', function () {
    return view('app-layout.index');
});
Route::get('/add_patient', [PatientsController::class, 'create'])->name('add_patient');
Route::get('/search-patient/name/{name}', [PatientsController::class, 'SearchByName']);
Route::get('/search-patient/phone/{phone}', [PatientsController::class, 'SearchByPhone']);
Route::get('/add_patient/get_id', [PatientsController::class, 'fetchID']);
Route::get('/appointments', function () {
    return view('hims.appointments', ['title' => 'appointments']);
});
Route::resource('/book_appointment', BookAppointmentController::class);
Route::resource('/patient', PatientsController::class);
Route::post('/add_patient', [PatientsController::class, 'store']);
Route::post('/charges', [ChargesController::class, 'modalityCharge']);
require __DIR__ . '/auth.php';

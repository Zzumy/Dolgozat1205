<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::get('/airlines', [AirlineController::class, 'DisplayAllAirlines']);
    Route::get('/flights', [FlightController::class, 'DisplayAllFlights']);
    Route::get('/users', [UserController::class, 'DisplayAllUsers']);
    Route::get('/user/travels/{airlineId}', [TravelController::class, 'displayUserFlightsForAirline']);
    Route::put('/user/travels/{id}/arrived', [TravelController::class, 'markArrived']);
    Route::delete('/flights/scheduled-for-tomorrow', [FlightController::class, 'deleteScheduledFlightsForTomorrow']);
    

});

Route::get('/api/airline', [AirlineController::class, 'index']);
Route::get('/api/airline/{id}', [AirlineController::class, 'show']);
Route::post('/api/airline', [AirlineController::class, 'store']);
Route::put('/api/airline/{id}', [AirlineController::class, 'update']);
Route::delete('/api/airline/{id}', [AirlineController::class, 'delete']);

Route::get('/airline/list', [AirlineController::class, 'listView']);
Route::get('/airline/new', [AirlineController::class, 'newView']);
Route::get('/airline/edit/{id}', [AirlineController::class, 'editView']);
Route::get('/airline/delete', [AirlineController::class, 'deleteView']);

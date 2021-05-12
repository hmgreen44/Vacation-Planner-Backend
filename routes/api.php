<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserTripController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api']], function () {
        // gets user with all order data
        Route::get('/user', [UserController::class, 'index']);
        // log out user
        Route::get('/logout', [UserController::class, 'logout']);
    
    
    
    
        Route::post('/trip/create', [TripController::class, 'create']);
        Route::get('/trips', [TripController::class, 'index']);
    
       
        Route::post('/trip/adduser', [UserTripController::class, 'store']);
        Route::get('/trips/organizer', [TripController::class, 'organizer']);
        Route::get('/trips/attendee', [TripController::class, 'attendee']);
        Route::get('/trips/attendees/{trip_id}', [UserTripController::class, 'attendees']);
    
    
        Route::get('/expenses', [ExpenseController::class, 'index']);
        Route::get('/expenses/{id}', [ExpenseController::class, 'tripExpenses']);
    
        Route::post('/expenses/addexpense', [ExpenseController::class, 'create']);
        Route::post('/expenses/addexpenses', [ExpenseController::class, 'createMultiple']);
        Route::get('/expense/destroy/{id}', [ExpenseController::class, 'destroy']);
    });

Route::post('/register', [UserController::class, 'create']);




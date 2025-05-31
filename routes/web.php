<?php

use Illuminate\Support\Facades\Route;


# Admin Controllers
use App\Http\Controllers\Admin\DenominationsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TechnicalController;
use App\Http\Controllers\DroppingController;
use GuzzleHttp\Middleware;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');

    # Client
    // Route::get('/', [ClientController::class,'index'])->name('client.index');
    Route::get('/client/create', [ClientController::class,'create'])->name('client.create');
    Route::get('/client/show', [ClientController::class,'show'])->name('client.show');
    Route::get('/client/{id}/fees', [ClientController::class,'showFees'])->name('client.showFees');
    Route::post('/client/store', [ApplicationController::class,'store'])->name('application.store');

    # Dropping
    Route::post('/client/dropping', [DroppingController::class,'store'])->name('dropping.store');


    # APPLICATION

    
    # TECHNICAL
    Route::get('/technical/show', [TechnicalController::class,'show'])->name('technical.show');
    Route::get('/technical/{id}/fees', [TechnicalController::class,'fees'])->name('technical.fees');
    Route::get('/technical/{id}/show-fees', [TechnicalController::class,'showFees'])->name('technical.showfees');
    Route::delete('/technical/{id}/delete-fees', [TechnicalController::class,'deleteFees'])->name('technical.deletefees');
    Route::post('/technical/update', [TechnicalController::class,'updateStatus'])->name('technical.update');
    Route::post('/technical/save-fees', [TechnicalController::class, 'saveFees'])->name('technical.saveFees');

    Route::patch('/technical/update/{id}/surcharges', [TechnicalController::class, 'deleteSurcharges'])->name('technical.deleteSurcharges');
    Route::patch('/technical/update/{id}/late-confirmation', [TechnicalController::class, 'deleteLateConfirmation'])->name('technical.deleteLateConfirmation');
    Route::patch('/technical/update/{id}/penalties', [TechnicalController::class, 'deletePenalties'])->name('technical.deletePenalties');
    Route::patch('/technical/update/{id}/others', [TechnicalController::class, 'deleteOthers'])->name('technical.deleteOthers');


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){

        // DENOMINATIONS
        Route::get('/denominations', [DenominationsController::class, 'index'])->name('denominations');
        Route::post('/store', [DenominationsController::class,'store'])->name('denominations.store');
        Route::patch('/{id}/update', [DenominationsController::class,'update'])->name('denominations.update');
        Route::delete('/{id}/destroy', [DenominationsController::class,'destroy'])->name('denominations.destroy');

        // User
        Route::get('/', [UsersController::class,'index'])->name('users');
        Route::patch('/{id}/update-roles', [UsersController::class,'update'])->name('users.update');
        Route::delete('/destroy/{id}', [UsersController::class,'destroy'])->name('users.destroy');
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        Route::get('/report', [ReportController::class, 'index'])->name('report');
        Route::get('/show', [ReportController::class,'show'])->name('report.show');
     });
});
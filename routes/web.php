<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HotelController;
use App\Http\Controllers\Backend\RundownController;
use App\Http\Controllers\Backend\TourController;
use App\Http\Controllers\Backend\TransportationController;
use App\Http\Controllers\Backend\TransportationImageController;
use App\Http\Controllers\Information\InformationController;
use App\Models\Rundown;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InformationController::class, 'index'])->name('information');


Route::prefix('information')->group(function () {
    Route::get('/transportation', [InformationController::class, 'transportation'])->name('transportation');
});
Route::prefix('admin')->group(function () {
    Route::resource('tour', TourController::class)->names('tour');
    Route::resource('dashboard', DashboardController::class)->names('dashboard');

    Route::resource('tour.transportation', TransportationController::class);
    Route::post('tour/{tour}/transportation/import', [TransportationController::class, 'import'])->name('tour.transportation.import');


    Route::resource('tour.transportationImage', TransportationImageController::class);
    Route::post('tour/{tour}/transportation-image/import', [TransportationImageController::class, 'import'])->name('tour.transportationImage.import');


    Route::resource('tour.hotel', HotelController::class);
    Route::post('tour/{tour}/hotel/import', [HotelController::class, 'import'])->name('tour.hotel.import');


    Route::resource('tour.rundown', RundownController::class);
    Route::post('tour/{tour}/rundown/import', [RundownController::class, 'import'])->name('tour.rundown.import');
});

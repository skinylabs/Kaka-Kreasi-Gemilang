<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HotelController;
use App\Http\Controllers\Backend\HotelImageController;
use App\Http\Controllers\Backend\ParticipantController;
use App\Http\Controllers\Backend\RuleController;
use App\Http\Controllers\Backend\RundownController;
use App\Http\Controllers\Backend\TataTertibController;
use App\Http\Controllers\Backend\TourController;
use App\Http\Controllers\Backend\TransportationController;
use App\Http\Controllers\Backend\TransportationImageController;
use App\Http\Controllers\Information\FunctionController;
use App\Http\Controllers\Information\InformationController;
use App\Http\Controllers\Information\TourInfoController;
use App\Models\Rundown;
use App\Models\TataTertib;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('information')->group(function () {
    Route::get('/', [TourInfoController::class, 'index'])->name('tour.info');
    Route::post('/check-password', [FunctionController::class, 'checkPassword'])->name('tour.checkPassword');
    Route::get('/{slug}', [TourInfoController::class, 'show'])->name('tour.info.show');
    Route::get('/{slug}/transportation', [TourInfoController::class, 'transportation'])->name('transportation');
    Route::get('/{slug}/hotel', [TourInfoController::class, 'hotel'])->name('hotel');
    Route::get('/{slug}/rundown', [TourInfoController::class, 'rundown'])->name('rundown');
});






Route::prefix('admin')->group(function () {
    Route::resource('tour', TourController::class)->names('tour');
    Route::resource('dashboard', DashboardController::class)->names('dashboard');

    Route::resource('tour.participant', ParticipantController::class);
    Route::post('tour/{tour}/participant/import', [ParticipantController::class, 'import'])->name('tour.participant.import');


    Route::resource('tour.transportation', TransportationController::class);
    Route::post('tour/{tour}/transportation/import', [TransportationController::class, 'import'])->name('tour.transportation.import');


    Route::resource('tour.transportationImage', TransportationImageController::class);
    // Route::post('tour/{tour}/transportation-image/import', [TransportationImageController::class, 'import'])->name('tour.transportationImage.import');


    Route::resource('tour.hotel', HotelController::class);
    Route::post('tour/{tour}/hotel/import', [HotelController::class, 'import'])->name('tour.hotel.import');

    Route::resource('tour.hotelImage', HotelImageController::class);
    // Route::post('tour/{tour}/hotel-image/import', [HotelImageController::class, 'import'])->name('tour.hotelImage.import');


    Route::resource('tour.rundown', RundownController::class);
    Route::post('tour/{tour}/rundown/import', [RundownController::class, 'import'])->name('tour.rundown.import');


    Route::resource('tatatertib', TataTertibController::class);
    Route::post('/tatatertib/import', [TataTertibController::class, 'import'])->name('tatatertib.import');


    Route::resource('tatatertib.rule', RuleController::class);
    Route::post('tatatertib/{tatatertib}/rule/import', [RuleController::class, 'import'])->name('tatatertib.rule.import');
});

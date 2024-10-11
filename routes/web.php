<?php

use App\Http\Controllers\Auth\InfoAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Tour\RundownController;
use App\Http\Controllers\Backend\Tour\ParticipantController;
use App\Http\Controllers\Backend\Tour\RuleController;
use App\Http\Controllers\Backend\Tour\TataTertibController;
use App\Http\Controllers\Backend\Tour\TourController;
use App\Http\Controllers\Backend\Tour\TransportationController;

use App\Http\Controllers\Information\PageInfoController;

Route::get('/', function () {
    return view('welcome');
});




// Route untuk Login pengguna biasa
Route::get('/information', [PageInfoController::class, 'index'])->name('tour.info');
Route::post('/check-password', [InfoAuthController::class, 'checkPassword'])->name('tour.checkPassword');

// Route untuk pengguna biasa
Route::middleware(['user'])->group(function () {
    Route::prefix('information')->group(function () {
        Route::get('/{slug}', [PageInfoController::class, 'show'])->name('tour.info.show');
        Route::get('/{slug}/transportation', [PageInfoController::class, 'transportation'])->name('transportation');
        Route::get('/{slug}/hotel', [PageInfoController::class, 'hotel'])->name('hotel');
        Route::get('/{slug}/rundown', [PageInfoController::class, 'rundown'])->name('rundown');
    });
});

// Route untuk admin
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', DashboardController::class)->names('dashboard');

        Route::resource('tour', TourController::class)->names('tour');

        Route::resource('tour.participant', ParticipantController::class);
        Route::post('tour/{tour}/participant/import', [ParticipantController::class, 'import'])->name('tour.participant.import');


        Route::resource('tour.transportation', TransportationController::class);
        Route::post('tour/{tour}/transportation/import', [TransportationController::class, 'import'])->name('tour.transportation.import');


        Route::resource('tour.rundown', RundownController::class);
        Route::post('tour/{tour}/rundown/import', [RundownController::class, 'import'])->name('tour.rundown.import');


        Route::resource('tatatertib', TataTertibController::class);
        Route::post('/tatatertib/import', [TataTertibController::class, 'import'])->name('tatatertib.import');


        Route::resource('tatatertib.rule', RuleController::class);
        Route::post('tatatertib/{tatatertib}/rule/import', [RuleController::class, 'import'])->name('tatatertib.rule.import');
    });
});

require __DIR__ . '/auth.php';

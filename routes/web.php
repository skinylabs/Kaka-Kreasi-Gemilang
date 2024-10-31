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
use App\Http\Controllers\Backend\Gallery\GalleryController;
use App\Http\Controllers\Backend\Gallery\LocationController;
use App\Http\Controllers\Backend\Homepage\FrontendTourController;
use App\Http\Controllers\Backend\Homepage\LinkController;
use App\Http\Controllers\Backend\Tour\TourImageController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryFrontendController;
use App\Http\Controllers\Frontend\TourFrontendController;
use App\Http\Controllers\Information\PageInfoController;
use App\Models\Link;

Route::get('/', function () {
    return view('pages.frontend.homepage');
});

Route::get('/tentangkaka', function () {
    return view('pages.frontend.tentangkaka');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/tour', [TourFrontendController::class, 'index'])->name('frontend.tours.index');

// Route untuk frontend (Public)
Route::get('/galleries', [GalleryFrontendController::class, 'index'])->name('frontend.galleries.index');
Route::get('/galleries/{gallery}', [GalleryFrontendController::class, 'show'])->name('frontend.galleries.show');




// Halaman informasi umum (belum login)
Route::get('/information', [PageInfoController::class, 'index'])->name('tour.info');

// Login menggunakan kode/password
Route::post('/check-password', [InfoAuthController::class, 'checkPassword'])->name('tour.checkPassword');



// Route untuk pengguna biasa
Route::middleware(['user'])->group(function () {
    Route::prefix('information')->group(function () {
        Route::get('/{slug}', [PageInfoController::class, 'show'])->name('tour.info.show');

        Route::get('/{slug}/transportation', [PageInfoController::class, 'transportation'])->name('transportation');

        Route::get('/{slug}/rundown', [PageInfoController::class, 'rundown'])->name('rundown');

        Route::get('/{slug}/galleries', [PageInfoController::class, 'galleries'])->name('galleries');

        Route::get('/{slug}/tatatertib', [PageInfoController::class, 'tatatertib'])->name('tatatertib');

        // Logout route
        Route::post('/logout', [InfoAuthController::class, 'logout'])->name('tour.logout');
    });
});

// Route untuk admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', DashboardController::class)->names('dashboard');
        Route::resource('tour', TourController::class)->names('tour');

        Route::resource('tour.tour-images', TourImageController::class);

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




        // Resource untuk Galleries dengan pengecualian middleware untuk index dan show
        Route::resource('galleries', GalleryController::class);

        Route::resource('locations', LocationController::class);

        Route::resource('frontend-tour', FrontendTourController::class);

        Route::resource('links', LinkController::class);
    });
});



require __DIR__ . '/auth.php';

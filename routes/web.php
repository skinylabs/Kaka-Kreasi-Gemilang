<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TourController;
use App\Http\Controllers\Information\InformationController;
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
});

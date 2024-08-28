<?php

use App\Http\Controllers\EmployesController;
use App\Http\Controllers\ClientFeedbackController;
use App\Http\Controllers\AdminFeedbackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned
| to the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Grouping admin routes with 'auth' middleware
Route::prefix('admin')->middleware('auth')->group(function () {
    // Admin dashboard route
    Route::get('/home', [EmployesController::class, 'dashboard'])->name('admin.home');
    
    Route::resource('employes', EmployesController::class);
    Route::get('/employes/{id}/vacation', [EmployesController::class, 'vacationRequest'])->name('vacation.request');
    Route::get('/employes/{id}/certificate', [EmployesController::class, 'certificateRequest'])->name('certificate.request');

    // Admin feedback viewing (protected by 'auth' middleware)
    Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('feedback.index');

    // Route to the contact page (if it's part of the admin)
    Route::post('/contact', [EmployesController::class, 'storeContact'])->name('contact.store');
});

// Routes for client feedback submission without 'auth' middleware
Route::get('/feedback', [ClientFeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [ClientFeedbackController::class, 'store'])->name('feedback.store');








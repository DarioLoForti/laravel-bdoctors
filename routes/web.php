<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\DoctorController as DoctorController;
use App\Http\Controllers\Admin\MessageController as MessageController;
use App\Http\Controllers\Admin\ReviewController as ReviewController;
use App\Http\Controllers\Admin\RatingController as RatingController;
use App\Http\Controllers\Admin\SponsorshipController as SponsorshipController;
use App\Http\Controllers\BraintreeController as BraintreeController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/doctors', DoctorController::class);
});

Route::resource('/messages', MessageController::class);
Route::resource('/reviews', ReviewController::class);
Route::resource('/ratings', RatingController::class);
Route::resource('/sponsorships', SponsorshipController::class);

Route::any('/payment', [BraintreeController::class, 'token'])->name('token')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::delete('/reviews/bulk-delete', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::delete('/messages/bulk-delete', [MessageController::class, 'destroy'])->name('messages.destroy');




require __DIR__ . '/auth.php';

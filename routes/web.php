<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReimbursementController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', \App\Http\Controllers\UserController::class);
    Route::get('/reimbursements/payment', [ReimbursementController::class, 'payment'])->name('reimbursements.payment');
    Route::resource('/reimbursements', \App\Http\Controllers\ReimbursementController::class);
    Route::patch('/reimbursements/approval/{id}', [ReimbursementController::class, 'approval'])->name('reimbursements.approved');
});



require __DIR__.'/auth.php';

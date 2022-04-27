<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => [
    'can:leave_application.create',
    'can:leave_application.authorize'
]], function () {
    Route::get('applications', \App\Http\Livewire\Applications::class)->name('applications');
    Route::get('deny/{id}', \App\Http\Livewire\Deny::class)->name('deny');
});

Route::group(['middleware' => [
    'can:leave_application.create',
]], function () {
    Route::get('leave-balance', \App\Http\Livewire\LeaveBalance::class)->name('leave.balance');
    Route::get('new-application', \App\Http\Livewire\NewApplication::class)->name('new.application');
});

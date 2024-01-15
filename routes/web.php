<?php

declare(strict_types=1);

use App\Http\Controllers\IpAddressesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SigninController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (app()->environment('local')) {
    Route::get('dev/signin/{user}', function (User $user) {
        Auth::login($user);

        return redirect()->to('/');
    });
}

Route::get('/', LandingPageController::class);
Route::get('signin', [SigninController::class, 'create'])->name('signin.create');
Route::post('signin', [SigninController::class, 'store'])->name('signin.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('ip-addresses', IpAddressesController::class)->except('destroy');
});

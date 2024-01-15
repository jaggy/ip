<?php

declare(strict_types=1);

use App\Http\Controllers\IpAddressesController;
use App\Http\Controllers\LandingPageController;
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
Route::resource('ip-addresses', IpAddressesController::class)->except('destroy');

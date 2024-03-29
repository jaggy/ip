<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\AuditSignin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SigninController
{
    public function create()
    {
        return inertia('signin/create', [
            'links' => [
                'store_path' => route('signin.store'),
            ],
        ]);
    }

    public function store(Request $request)
    {
        if (! $user = User::where('email', $request->input('email'))->first()) {
            throw ValidationException::withMessages([
                'email' => "This email address doesn't exist.",
            ]);
        }

        if (! Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => "The password doesn't match the given email address.",
            ]);
        }

        Auth::login($user);

        AuditSignin::dispatch($user, $request);

        return redirect()->route('ip-addresses.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('signin.create');
    }
}

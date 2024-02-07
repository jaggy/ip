<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'inertiaUser' => $this->user(),
        ]);
    }

    private function user(): ?UserResource
    {
        if (Auth::guest()) {
            return null;
        }

        return UserResource::make(Auth::user());
    }
}

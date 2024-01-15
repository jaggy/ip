<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait ActingAsRandomUser
{
    private User $user;

    public function setupActingAsRandomUser(): void
    {
        $this->user = User::factory()->create();

        Auth::login($this->user);
    }
}

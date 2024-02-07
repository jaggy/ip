<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\User;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditSignin
{
    use Dispatchable;

    public function __construct(
        private User $user,
        private Request $request,
    ) {
    }

    public function handle(): void
    {
        Audit::create([
            'user_type' => 'user',
            'user_id'   => $this->user->id,
            'event'     => 'login',
            'auditable_type' => User::class,
            'auditable_id'   => $this->user->id,
            'old_values' => [],
            'new_values' => [],
            'ip_address' => $this->request->ip(),
            'url' => $this->request->url(),
            'user_agent' => $this->request->userAgent(),
        ]);
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\SigninController;

use App\Jobs\AuditSignin;
use App\Models\User;
use Illuminate\Support\Facades\Bus;

use function Pest\Laravel\assertAuthenticatedAs;
use function Pest\Laravel\assertGuest;

beforeEach(function () {
    $this->user = User::factory()->create([
        'email'    => 'alice.lee@humans.ph',
        'password' => bcrypt('some valid pa$$word.'),
    ]);
});

it('signs in and redirects to the ip addresses page', function () {
    Bus::fake(AuditSignin::class);

    assertGuest();

    signin([
        'email'    => 'alice.lee@humans.ph',
        'password' => 'some valid pa$$word.',
    ])->assertRedirect(
        route('ip-addresses.index')
    );

    assertAuthenticatedAs($this->user);

    Bus::assertDispatched(function (AuditSignin $job) {
        return inspect($job)->user->is($this->user);
    });
});

it('validates an existing email', function () {
    signin([
        'email' => 'i.do.not.exist@example.com',
    ])->assertInvalid([
        'email' => "This email address doesn't exist.",
    ]);

    assertGuest();
});

it('validates the the email matches the password', function () {
    signin([
        'email'    => 'alice.lee@humans.ph',
        'password' => 'i am not the password for alice',
    ])->assertInvalid([
        'email' => "The password doesn't match the given email address.",
    ]);
});

function signin(array $attributes = [])
{
    return test()->post(
        route('signin.store'),
        [
            'email'    => 'alice.lee@humans.ph',
            'password' => 'some valid pa$$word.',
            ...$attributes,
        ]
    );
}

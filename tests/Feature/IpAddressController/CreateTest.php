<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use Illuminate\Support\Facades\Auth;
use Inertia\Testing\AssertableInertia;
use Tests\Fixtures\ActingAsRandomUser;

uses(ActingAsRandomUser::class);

it('shows the page to create a new ip address', function () {
    showCreateIpAddress()
        ->assertOk()
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('ip-addresses/create')
            ->has('links')
        );
});

it("doesn't show the page to guests", function () {
    Auth::logout();

    showCreateIpAddress()->assertRedirect(
        route('signin.create'),
    );
});

function showCreateIpAddress()
{
    return test()->get(
        route('ip-addresses.create')
    );
}

<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

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

function showCreateIpAddress()
{
    return test()->get(
        route('ip-addresses.create')
    );
}

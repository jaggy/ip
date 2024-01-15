<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use App\Models\IpAddress;
use Illuminate\Support\Facades\Auth;
use Inertia\Testing\AssertableInertia;
use Tests\Fixtures\ActingAsRandomUser;

uses(ActingAsRandomUser::class);

it('lists the ip addresses', function () {
    IpAddress::factory()->count(4)->create();

    listIpAddresses()
        ->assertOk()
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('ip-addresses/index')
            ->has('ipAddresses', 4)
        );
});

it("doesn't show the page to guests", function () {
    Auth::logout();

    listIpAddresses()->assertRedirect(
        route('signin.create'),
    );
});

function listIpAddresses()
{
    return test()->get(
        route('ip-addresses.index')
    );
}

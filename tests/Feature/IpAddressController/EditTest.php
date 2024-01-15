<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use App\Models\IpAddress;
use Illuminate\Support\Facades\Auth;
use Inertia\Testing\AssertableInertia;
use Tests\Fixtures\ActingAsRandomUser;

uses(ActingAsRandomUser::class);

beforeEach(function () {
    $this->address = IpAddress::factory()->create();
});

it('shows the page to update the ip address', function () {
    showUpdateIpAddress($this->address)
        ->assertOk()
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('ip-addresses/edit')
            ->has('ipAddress')
        );
});

it("doesn't show the page to guests", function () {
    Auth::logout();

    showUpdateIpAddress($this->address)->assertRedirect(
        route('signin.create'),
    );
});

function showUpdateIpAddress(IpAddress $address)
{
    return test()->get(
        route('ip-addresses.edit', $address)
    );
}

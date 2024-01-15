<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use Tests\Fixtures\ActingAsRandomUser;

use function Pest\Laravel\assertDatabaseCount;

uses(ActingAsRandomUser::class);

it('creates an ip4 address', function () {
    assertDatabaseCount('ip_addresses', 0);

    createIpAddress([
        'label'      => 'Cloudflare DNS Resolver',
        'ip_address' => '1.1.1.1',
    ]);

    assertDatabaseCount('ip_addresses', 1);
});

function createIpAddress(array $attributes = [])
{
    return test()->post(
        route('ip-addresses.store'),
        [
            'ip_address' => fake()->randomElement([fake()->ipv4, fake()->ipv6]),
            'label'     => fake()->randomElement([fake()->ipv4, fake()->ipv6]),
            ...$attributes,
        ],
    );
}

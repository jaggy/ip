<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use App\Models\IpAddress;
use Tests\Fixtures\ActingAsRandomUser;

use function Pest\Laravel\assertDatabaseCount;

uses(ActingAsRandomUser::class);

it('creates an ip v4 address', function () {
    assertDatabaseCount('ip_addresses', 0);

    createIpAddress([
        'label'      => 'Cloudflare DNS Resolver',
        'ip_address' => '1.1.1.1',
    ]);

    assertDatabaseCount('ip_addresses', 1);

    expect(IpAddress::first())
        ->label     ->toBe('Cloudflare DNS Resolver')
        ->ip_address->toBe('1.1.1.1');
});

it('creates an ip v6 address', function () {
    assertDatabaseCount('ip_addresses', 0);

    createIpAddress([
        'label'      => 'IBM IPv6 Example',
        'ip_address' => '2001:db8:3333:4444:5555:6666:7777:8888',
    ]);

    assertDatabaseCount('ip_addresses', 1);

    expect(IpAddress::first())
        ->label     ->toBe('IBM IPv6 Example')
        ->ip_address->toBe('2001:db8:3333:4444:5555:6666:7777:8888');
});

it('validates the data', function ($attribute, $value, $message) {
    createIpAddress([
        $attribute => $value,
    ])->assertInvalid([
        $attribute => $message,
    ]);
})->with([
    'ip address is required' => ['ip_address', null, 'The ip address field is required.'],
    'ip address is valid' => ['ip_address', 'not an ip address', 'The ip address field must be a valid IP address.'],
]);

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

<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use App\Models\IpAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\Fixtures\ActingAsRandomUser;

use function Pest\Laravel\assertDatabaseCount;

uses(ActingAsRandomUser::class);

it('creates an ip v4 address', function () {
    assertDatabaseCount('ip_addresses', 0);

    createIpAddress([
        'label'      => 'Cloudflare DNS Resolver',
        'ip_address' => '1.1.1.1',
    ])->assertRedirect();

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
    'label is required'                      => ['label', null, 'The label field is required.'],
    'label must be less than 255 characters' => ['label', Str::random(300), 'The label field must not be greater than 255 characters.'],
    'ip address is required'                 => ['ip_address', null, 'The ip address field is required.'],
    'ip address is valid'                    => ['ip_address', 'not an ip address', 'The ip address field must be a valid IP address.'],
]);

it("doesn't allow duplicate ip addresses", function () {
    IpAddress::factory()->create([
        'ip_address' => '1.1.1.1',
    ]);

    assertDatabaseCount('ip_addresses', 1);

    createIpAddress([
        'label'      => 'Some Label',
        'ip_address' => '1.1.1.1',
    ])->assertInvalid([
        'ip_address' => 'The ip address has already been taken.',
    ]);
});

it("doesn't show the page to guests", function () {
    Auth::logout();

    createIpAddress()->assertRedirect(
        route('signin.create'),
    );
});

function createIpAddress(array $attributes = [])
{
    return test()->post(
        route('ip-addresses.store'),
        [
            'label'      => fake()->words(5, asText: true),
            'ip_address' => fake()->randomElement([fake()->ipv4, fake()->ipv6]),
            ...$attributes,
        ],
    );
}

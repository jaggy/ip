<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use App\Models\IpAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\Fixtures\ActingAsRandomUser;

uses(ActingAsRandomUser::class);

beforeEach(function () {
    $this->address = IpAddress::factory()->create([
        'label' => 'Old Label',
    ]);
});

it('updates the ip address label', function () {
    updateIpAddress($this->address, [
        'label' => 'New Label',
    ])->assertRedirect(
        route('ip-addresses.show', $this->address)
    );

    expect(IpAddress::first())
        ->label->toBe('New Label');
});

it('validates the data', function ($attribute, $value, $message) {
    updateIpAddress($this->address, [
        $attribute => $value,
    ])->assertInvalid([
        $attribute => $message,
    ]);
})->with([
    'label is required'                      => ['label', null, 'The label field is required.'],
    'label must be less than 255 characters' => ['label', Str::random(300), 'The label field must not be greater than 255 characters.'],
]);

it("doesn't show the page to guests", function () {
    Auth::logout();

    updateIpAddress($this->address)->assertRedirect(
        route('signin.create'),
    );
});

function updateIpAddress(IpAddress $address, array $attributes = [])
{
    return test()->put(
        route('ip-addresses.update', $address),
        [
            'label' => fake()->words(5, asText: true),
            ...$attributes,
        ],
    );
}

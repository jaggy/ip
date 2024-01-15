<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class IpAddressesController
{
    public function index()
    {
    }

    public function create()
    {
        return inertia('ip-addresses/create', [
            'links' => [
                'store_path' => route('ip-addresses.store'),
            ],
        ]);
    }
}

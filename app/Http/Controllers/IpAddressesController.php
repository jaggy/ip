<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\IpAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'label'      => ['required', 'max:255'],
            'ip_address' => ['required', 'ip', Rule::unique('ip_addresses')],
        ]);

        IpAddress::create($attributes);

        return redirect()->back();
    }
}

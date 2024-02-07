<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\AuditResource;
use App\Http\Resources\IpAddressResource;
use App\Models\IpAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IpAddressesController
{
    public function index()
    {
        return inertia('ip-addresses/index', [
            'ipAddresses' => IpAddressResource::collection(
                IpAddress::latest()->get()
            ),
        ]);
    }

    public function show(IpAddress $ipAddress)
    {
        return inertia('ip-addresses/show', [
            'ipAddress' => IpAddressResource::make($ipAddress),
            'audits' => AuditResource::collection(
                $ipAddress->audits()->latest()->get(),
            ),
        ]);
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

    public function edit(IpAddress $ipAddress)
    {
        return inertia('ip-addresses/edit', [
            'ipAddress' => IpAddressResource::make($ipAddress),
            'links' => [
                'update_path' => route('ip-addresses.update', $ipAddress),
            ],
        ]);
    }

    public function update(Request $request, IpAddress $ipAddress)
    {
        $attributes = $request->validate([
            'label' => ['required', 'max:255'],
        ]);

        $ipAddress->update($attributes);

        return redirect()->route('ip-addresses.show', $ipAddress);
    }
}

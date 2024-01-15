<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\IpAddress */
class IpAddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'label'      => $this->label,
            'ip_address' => $this->ip_address,
            'links'      => [
                'show_path' => route('ip-addresses.show', $this),
                'edit_path' => route('ip-addresses.edit', $this),
            ],
        ];
    }
}

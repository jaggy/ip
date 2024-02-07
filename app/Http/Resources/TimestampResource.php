<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/** @mixin Carbon  */
class TimestampResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'short' => $this->diffForHumans(syntax: false, short: true),
        ];
    }
}

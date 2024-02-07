<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use OwenIt\Auditing\Models\Audit;

/** @mixin Audit */
class AuditResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event' => $this->event,
            'changes' => $this->changes(),
        ];
    }

    private function changes(): array
    {
        return Collection::make([
            ...array_keys($this->old_values),
            ...array_keys($this->new_values),
        ])->unique()->mapWithKeys(function ($attribute) {
            return [
                $attribute => [
                    'before' => $this->old_values[$attribute] ?? null,
                    'after'  => $this->new_values[$attribute] ?? null,
                ],
            ];
        })->toArray();
    }
}

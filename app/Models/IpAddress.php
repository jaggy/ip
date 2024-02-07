<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class IpAddress extends Model implements AuditableContract
{
    use Auditable, HasFactory, Unguarded;
}

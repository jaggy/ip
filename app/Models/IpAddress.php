<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\Unguarded;
use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    use Unguarded;
}

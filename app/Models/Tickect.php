<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tickect extends Pivot
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

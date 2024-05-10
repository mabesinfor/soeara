<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Support extends Pivot
{
    use HasFactory;
    protected $table = 'supports';

    protected $fillable = [
        'user_id',
        'petition_id',
    ];
}

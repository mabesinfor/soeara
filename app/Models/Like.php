<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Like extends Pivot
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'petition_id',
    ];
}

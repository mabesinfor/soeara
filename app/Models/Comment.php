<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Comment extends Pivot
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'petition_id',
    ];
}

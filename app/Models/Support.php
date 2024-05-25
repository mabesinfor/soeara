<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Support extends Pivot
{
    use HasFactory;
    protected $table = 'supports';

    protected $fillable = [
        'user_id',
        'petition_id',
        'created_at',
        'updated_at'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function petitions(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPetition extends Pivot
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $with = [];

    public function petitions(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'user_id');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

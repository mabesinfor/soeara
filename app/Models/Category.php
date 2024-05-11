<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $guard = ['id'];

    public function petitions(): BelongsToMany
    {
        return $this->belongsToMany(Petition::class)->using(CategoryPetition::class);
    }
}

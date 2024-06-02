<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Petition extends Model
{
    use HasFactory;

    protected $table = 'petitions';
    protected $guarded = 'id';
    protected $fillable = [
        'title',
        'slug',
        'desc',
        'image',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->using(CategoryPetition::class);
    }

    public function supporters(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'supports')->using(Support::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->using(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'petisi_id');
    }

}
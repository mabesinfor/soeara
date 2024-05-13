<?php

namespace App\Models;

use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles, HasPanelShield;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'email_verified_at',
        'avatar',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function petitions(): HasMany
    {
        return $this->hasMany(Petition::class);
    }

    public function supportedPetitions(): BelongsToMany
    {
        return $this->belongsToMany(Petition::class)->using(Support::class);
    }

    public function likedPetitions(): BelongsToMany
    {
        return $this->belongsToMany(Petition::class)->using(Like::class);
    }

    public function commentedPetitions(): BelongsToMany
    {
        return $this->belongsToMany(Petition::class)->using(Comment::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'username',
        'discord_id',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    /**
     * The highlighted Discord ID.
     *
     * @return string
     */
    public function getHighlightAttribute()
    {
        return "<@{$this->discord_id}>";
    }

    public function leaderboard(): HasOne
    {
        return $this->hasOne(Leaderboard::class);
    }
}

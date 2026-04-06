<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leaderboard extends Model
{
    /** @use HasFactory<\Database\Factories\LeaderboardFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coin_balance',
        'exp_ponts',
    ];

    protected $casts = [
        'coin_balance' => 'integer',
        'exp_points' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

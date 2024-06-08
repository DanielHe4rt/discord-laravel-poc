<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Channel extends Model
{
    use HasUuids, HasFactory;

    protected $table = 'guild_channels';

    protected $fillable = [
        'guild_id',
        'name',
        'messages_count',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class);
    }
}

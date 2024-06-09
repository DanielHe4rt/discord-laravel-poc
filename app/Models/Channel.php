<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasUuids, HasFactory;

    protected $table = 'guild_channels';

    protected $fillable = [
        'id',
        'guild_id',
        'name',
        'messages_count',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}

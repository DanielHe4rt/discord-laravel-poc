<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guild extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'icon_url',
        'members_count',
        'messages_count',
        'name',
        'is_nsfw'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

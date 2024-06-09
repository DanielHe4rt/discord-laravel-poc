<?php

namespace App\Models;

use App\Enums\UnaryEnum;
use App\Observers\GuildObserver;
use App\Traits\MessageCountable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


#[ObservedBy(GuildObserver::class)]
class Guild extends Model
{
    use HasFactory, HasUuids, MessageCountable;

    protected $fillable = [
        'id',
        'user_id',
        'icon_url',
        'members_count',
        'messages_count',
        'name',
        'is_nsfw'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class, 'guild_id');
    }

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class, 'guild_id');
    }

    public function incrementMembers(UnaryEnum $enum): bool
    {
        return match($enum) {
            UnaryEnum::Increment => $this->increment('members_count'),
            UnaryEnum::Decrement => $this->decrement('members_count'),
        };
    }

}

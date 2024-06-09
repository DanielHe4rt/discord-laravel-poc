<?php

namespace Database\Factories;

use App\Models\Guild;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'messages_count' => 0,
            'guild_id' => Guild::factory(),
            'user_id' => User::factory(),
        ];
    }
}

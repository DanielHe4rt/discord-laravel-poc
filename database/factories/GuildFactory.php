<?php

namespace Database\Factories;

use App\Models\Guild;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GuildFactory extends Factory
{
    protected $model = Guild::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'members_count' => $this->faker->randomNumber(),
            'messages_count' => $this->faker->word(),
            'is_nsfw' => $this->faker->boolean(),

            'user_id' => User::factory(),
        ];
    }
}

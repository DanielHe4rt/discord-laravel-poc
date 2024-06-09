<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Guild;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChannelFactory extends Factory
{
    protected $model = Channel::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'messages_count' => $this->faker->randomNumber(),

            'guild_id' => Guild::factory(),
        ];
    }
}

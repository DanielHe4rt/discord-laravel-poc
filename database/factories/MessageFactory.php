<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Member;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'content' => $this->faker->word(),

            'channel_id' => Channel::factory(),
            'member_id' => Member::factory(),
        ];
    }
}

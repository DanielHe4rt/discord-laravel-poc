<?php

namespace Database\Seeders\Development;


use App\Models\Guild;
use Illuminate\Database\Seeder;

class GuildsSeeder extends Seeder
{
    public array $guilds = [
        [
            'user_id' => '609d2ac1-51a1-4aa1-bced-0fc4859a616b',
            'icon_url' => 'https://github.com/danielhe4rt.png',
            'name' => 'basement devs',
            'is_nsfw' => false
        ]
    ];

    public function run(): void
    {
        Guild::truncate();
        foreach ($this->guilds as $guild) {
            $guild = Guild::create($guild);

            $guild->members()->create(['user_id' => 'b916363a-4042-42d1-86a6-b9c245b6c530']);
            $guild->channels()->create(['name' => 'General']);
        }
    }
}

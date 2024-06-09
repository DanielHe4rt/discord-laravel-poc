<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Development\GuildsSeeder;
use Database\Seeders\Development\UsersSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if ($this->underDevelopmentEnvironment()) {
            $this->call(UsersSeeder::class);
            $this->call(GuildsSeeder::class);
        }


//        // User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }

    /**
     * @return bool
     */
    public function underDevelopmentEnvironment(): bool
    {
        return in_array(config('app.env'), ['local', 'staging']);
    }
}

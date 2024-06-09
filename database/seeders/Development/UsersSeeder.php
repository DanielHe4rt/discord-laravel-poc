<?php

namespace Database\Seeders\Development;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public array $users = [
        [
            'id' => '609d2ac1-51a1-4aa1-bced-0fc4859a616b',
            'name' => 'danielhe4rt',
            'email' => 'danielhe4rt@gmail.com',
            'github_username' => 'danielhe4rt',
        ],
        [
            'id' => 'b916363a-4042-42d1-86a6-b9c245b6c530',
            'name' => 'Luis Nadachi',
            'email' => 'nadachi@gmail.com',
            'github_username' => 'luisnadachi',
        ]
    ];

    public function run(): void
    {
        User::truncate();

        foreach($this->users as $user) {
            User::create([
                ...$user,
                'password' => Hash::make('password')
            ]);
        }
    }
}

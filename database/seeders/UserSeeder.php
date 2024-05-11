<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'anton@premier-partner.ru'
        ],
            [
                'name' => 'Super User',
                'password' => Hash::make('1234')
            ]);

        $user->profile()->create([
            'first_name' => fake()->name,
            'second_name' => fake()->lastName,
            'gender' => random_int(0, 1),
            'is_married' => random_int(0, 1),
            'birthed_at' => fake()->date('Y-m-d'),
        ]);

        $users = User::factory(10)->create();

        foreach ($users as $user)
        {
            $user->profile()->create([
                'first_name' => fake()->name,
                'second_name' => fake()->lastName,
                'gender' => random_int(0, 1),
                'is_married' => random_int(0, 1),
                'birthed_at' => fake()->date('Y-m-d'),
            ]);
        }
    }
}

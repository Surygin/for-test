<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

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

        $this->call([

        ]);
    }
}

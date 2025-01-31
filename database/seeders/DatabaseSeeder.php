<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
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

        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            RoleSeeder::class,
            CommentSeeder::class,
            LikeSeeder::class
        ]);
    }
}

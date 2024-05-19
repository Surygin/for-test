<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 1;
        while ($i <= 30):
            $randomProfile = Profile::all()->random();
            $randomPost = Post::all()->random();
            $randomComment = Comment::all()->random();
            $randomProfile->likedPosts()->toggle($randomPost->id);
            $randomProfile->likedComments()->toggle($randomComment->id);
            $i++;
        endwhile;
    }
}

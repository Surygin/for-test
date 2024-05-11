<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Termwind\Components\Li;

class go extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My command for tests';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $profile = Profile::first();
        dd($profile->likedComments);
//        $profile->likedPosts()->toggle($profile->id);
    }
}

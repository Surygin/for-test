<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Loger;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
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
//        $post = Post::all()->random();
//        $tag = Tag::all()->random();
//

//        Category::create([
//            'title' => 'new asdas',
//            'description' => 'sldkalksjd'
//        ]);
//            $category = Category::withTrashed()
//                ->where('id', 8)
//                ->first();
//            $category->restore();

//        $category = Category::find(8);
//        dd($category->comments());

//        $user = User::firstOrCreate([
//            'email' => 'tesakasd9@mail.ru'
//        ],
//        [
//            'name' => 'asdasdad',
//            'password' => Hash::make('1234')
//        ]);
//
//        $user->profile()->create([
//            'first_name' => fake()->name,
//            'second_name' => fake()->lastName,
//            'gender' => random_int(0, 1),
//            'is_married' => random_int(0, 1),
//            'birthed_at' => fake()->date('Y-m-d'),
//        ]);

        $post = Post::create([
            'title' => fake()->sentence(5),
            'description' => fake()->sentence(15),
            'content' => fake()->text(500),
            'category_id' => Category::all()->random()->id,
            'profile_id' => Profile::all()->random()->id,
            'views' => random_int(10, 500),
        ]);

        $post->image()->create([
            'url' => fake()->imageUrl
        ]);


//        $post = Comment::find(23);
//        $post->delete();
//        $post->update([
//            'content' => 'new Contentasd'
//        ]);
//
//        $comment = Comment::withTrashed()
//                ->where('id', 23)
//                ->first();
//        $comment->restore();
//        dump('_______________________');
//        dd($post->logers());

    }
}

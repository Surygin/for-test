<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
//        $user = auth()->user()->name;
        $postsCount = Post::all()->count();
        $commentsCount = Comment::all()->count();
        $tagsCount = Tag::all()->count();
        $userCount = User::all()->count();
        return inertia('Main/Index', compact('postsCount', 'commentsCount', 'tagsCount', 'userCount'));
    }
}

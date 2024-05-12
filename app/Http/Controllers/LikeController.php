<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLikePost(Request $request, Post $post)
    {
        $profile = Profile::find($request->user_id);
        $profile->likedPosts()->toggle($post->id);

        return http_response_code(200);
    }
}

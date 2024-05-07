<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\IndexResource;
use App\Http\Resources\Post\ShowResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $posts = IndexResource::collection($posts)->resolve();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $post = [
            'title' => 'title post',
            'description' => 'description post',
            'content' => 'Some content',
            'img_path' => '1.jpg',
            'preview_path' => '1min.jpg',
            'category_id' => 2,
            'profile_id' => 2,
            'views' => 3
        ];

        Post::create($post);

        return http_response_code(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = ShowResource::make($post)->resolve();
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        $data = [
            'title' => 'title post 2',
            'description' => '2 description post',
            'content' => 'Some content',
            'img_path' => '2.jpg',
            'preview_path' => '2min.jpg',
            'category' => 'something',
            'author' => 'admin',
            'views' => 3
        ];

        $post->update($data);

        return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $id = $post->id;
        $post->delete();
        return 'Post ' . $id . ' - deleted';
    }

}

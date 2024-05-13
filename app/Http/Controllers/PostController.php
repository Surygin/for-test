<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Post\IndexResource;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\ShowResource;
use App\Http\Resources\Post\StoreResource;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $posts = Post::all();
//        $posts = IndexResource::collection($posts)->resolve();
        return new PostCollection(Post::paginate(10));
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
    public function store(PostRequest $request)
    {
        $post = StoreResource::make($request)->resolve();
        Post::create($post());

        return http_response_code(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = ShowResource::make($post)->resolve();
        return compact('post');
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
    public function update(PostRequest $request, Post $post)
    {
        $data = StoreResource::make($request)->resolve();
        $post->update($data);

        return http_response_code(200);
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

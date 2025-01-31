<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\IndexRequest;
use App\Http\Requests\Post\PostRequest;
use App\Http\Resources\Post\IndexResource;
use App\Http\Resources\Post\ShowResource;
use App\Http\Resources\Post\StoreResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $posts = Post::filter($data)->get();
        return IndexResource::collection($posts)->resolve();
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

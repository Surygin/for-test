<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\IndexRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\IndexResource;
use App\Http\Resources\Post\ShowResource;
use App\Http\Resources\Tag\TagResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $posts = Post::filter($data)->get();
        $posts = IndexResource::collection($posts)->resolve();

        if ($request->wantsJson()){
            return $posts;
        }

        return inertia('Post/Index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        $post = PostService::store($data);
        return ShowResource::make($post)->resolve();
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        return inertia('Post/Create', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = ShowResource::make($post)->resolve();
        return inertia('Post/Show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        dd($post);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = TagResource::collection(Tag::all())->resolve();
        return $tags;
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
    public function store(TagRequest $request)
    {
        $data = $request->validated();

        $tag = Tag::create($data);

        return TagResource::make($tag)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $tag = TagResource::make($tag)->resolve();

        return $tag;
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
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag->update($data);

        return TagResource::make($tag)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return http_response_code(200);
    }
}

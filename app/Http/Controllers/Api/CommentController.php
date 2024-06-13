<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        $comments = CommentResource::collection($comments)->resolve();
        return $comments;
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
    public function store(Request $request)
    {
        $comment = [
            'content' => 'some content' . rand(1, 100),
            'author' => 'this admin',
            'post' => rand(1, 3),
            'comment_parent' => 1,
        ];

        Comment::create($comment);

        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment = CommentResource::make($comment)->resolve();

        return $comment;
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
    public function update(Request $request, Comment $comment)
    {
        $data = [
            'content' => 'new some content' . rand(1, 100),
            'author' => 'this admin',
            'post' => rand(1, 3),
            'comment_parent' => 1,
        ];

        $comment->update($data);

        return 'done';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return 'Comment is deleted!';
    }
}

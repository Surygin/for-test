<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $users = UserResource::collection($data)->resolve();
        return $users;
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
        $data = UserResource::make($request)->resolve();
        User::create($data);

        return http_response_code(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data = UserResource::make($user)->resolve();

        return $data;
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
    public function update(Request $request, User $user)
    {
        $data = UserResource::make($request)->resolve();
        $user->update($data);
        return http_response_code(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return http_response_code(200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        $profiles = ProfileResource::collection($profiles)->resolve();

        return $profiles;
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
//        dd(rand(1980, 2008) . '-' . rand(1, 12) . '-' . rand(1, 30));
        $data = [
            'first_name' => 'some first_name' . rand(1, 30),
            'second_name' => 'second_name',
            'third_name' => 'third_name',
            'gender' => rand(0, 1),
            'is_married' => rand(0, 1),
            'age' => rand(18, 70),
            'birthed_at' => rand(1980, 2008) . '-' . rand(1, 12) . '-' . rand(1, 30),
            'user_id' => 4
        ];

        Profile::create($data);

        return http_response_code(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $profile = ProfileResource::make($profile)->resolve();

        return $profile;
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
    public function update(Request $request, Profile $profile)
    {
        $data = [
            'first_name' => 'new some first_name' . rand(1, 30),
            'second_name' => 'second_name',
            'third_name' => 'third_name',
            'gender' => rand(0, 1),
            'is_married' => rand(0, 1),
            'age' => rand(18, 70),
            'birthed_at' => rand(1980, 2008) . '-' . rand(1, 12) . '-' . rand(1, 30),
        ];

        $profile->update($data);

        return 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return 'Destroy is done!';
    }
}

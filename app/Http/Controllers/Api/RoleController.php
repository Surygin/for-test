<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $roles = RoleResource::collection($roles)->resolve();

        return $roles;
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
        $data = RoleResource::make($request)->resolve();

        Role::create($data);

        return http_response_code(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role = RoleResource::make($role)->resolve();

        return $role;
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
    public function update(Request $request, Role $role)
    {
        $data = RoleResource::make($request)->resolve();

        $role->update($data);

        return http_response_code(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return http_response_code(200);
    }
}

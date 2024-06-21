<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $categories = CategoryResource::collection($categories)->resolve();
        return inertia('Category/Index', compact('categories'));
    }

    public function create()
    {
        return inertia('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validationData();
        $category = Category::create($data);
        return CategoryResource::make($category)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();
        return inertia('Category/Show', compact('category'));
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
    public function destroy(string $id)
    {
        //
    }
}

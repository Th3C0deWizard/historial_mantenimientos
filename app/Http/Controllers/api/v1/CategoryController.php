<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\CategorieStoreRequest;
use App\Http\Resources\api\v1\CategorieResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json(["data" => CategorieResource::collection($categories)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieStoreRequest $request)
    {
        $category = Category::create($request->all());
        return response()->json(['data' => $category], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(['data' => new CategorieResource($category)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        return response()->json(['message' => "You can't edit a category"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => "Category deleted succesfully"], 200);
    }
}

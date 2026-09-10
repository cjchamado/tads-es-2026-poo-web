<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::paginate();
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return $category;
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(
        Category $category,
        CategoryUpdateRequest $request
    ) {
        $data = $request->validated();

        $category->update($data);

        return $category;
    }

    public function destroy(
        Category $category
    ) {
        $hasProduct = \App\Models\Product::where('category_id', $category->id)->exists();

        if ($hasProduct) {
            // 422 Unprocessable Entity
            return response()->json([
                'message' => 'Categoria com produtos relacionados',
            ], 404);
        }

        $category->delete();

        // 204 No Content
        return response()->json([
            'message' => 'Categoria excluída',
        ], 204);
    }
}

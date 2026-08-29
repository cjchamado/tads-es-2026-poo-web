<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::paginate();
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return $category;
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(
        Category $category,
        Request $request
    ) {
        $category->name = $request->name ?? $category->name;
        $category->description = $request->description ?? $category->description;

        $category->save();

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

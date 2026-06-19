<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(10);
        return response()->json(['success' => true, 'data' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        $category = Category::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully!',
            'data' => $category
        ], 201);
    }

    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);
        $category->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully!',
            'data' => $category
        ], 201);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!'
        ]);
    }
}

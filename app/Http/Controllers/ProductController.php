<?php

namespace App\Http\Controllers;

use App\Jobs\SendProductNotification;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        return response()->json(['success' => true, 'data' => $products]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        $product = Product::create($data);
        SendProductNotification::dispatch($product, 'created');
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully!',
            'data' => $product
        ], 201);
    }

    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        $product->update($data);
        SendProductNotification::dispatch($product, 'updated');
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully!',
            'data' => $product
        ], 201);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully!'
        ]);
    }
}

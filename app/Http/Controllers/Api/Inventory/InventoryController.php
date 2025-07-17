<?php

namespace App\Http\Controllers\Api\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function before()
    {
        $startTime = microtime(true);

        $products = Product::all(); // Fetches all products

        $formattedProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'stock_quantity' => $product->stock_quantity,
                'category_name' => $product->category->name,
                'created_at' => $product->created_at->format('Y-m-d H:i:s'),
            ];
        });
        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime);

        return response()->json([
            'message' => 'Product list before optimizing',
            'execution_time(seconds)' => round($executionTime, 4),
            'products' => $formattedProducts->count(),
        ]);
    }

    public function after()
    {
        $startTime = microtime(true);
        $products = Product::with('category')->get();
        $formattedProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'stock_quantity' => $product->stock_quantity,
                'category_name' => $product->category->name,
                'created_at' => $product->created_at->format('Y-m-d H:i:s'),
            ];
        });
        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime);
        return response()->json([
            'message' => 'Optimized product list (Eager Loading)',
            'execution_time(seconds)' => round($executionTime, 4),
            'products' => $formattedProducts->count(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('Product.product');
    }

    public function user_index()
    {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('products', 'public'); // saved in storage/app/public/products
            $validated['image'] = $path;
        }

        // Create product
        $product = Product::create($validated);

        return response()->json([
            'message' => '✅ Product added successfully!',
            'product' => $product,
        ]);
    }
}

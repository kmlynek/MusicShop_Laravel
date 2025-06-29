<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getActiveProducts()
    {
        return Product::where('is_active', true)->get(); // Wyświetla tylko aktywne
    }

    public function createProduct($request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'is_active' => true,
        ]);
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function updateProduct($id, $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'description', 'price', 'category_id', 'brand_id']));
    }


    public function deactivateProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->is_active = false;
        $product->save();
    }
}

<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getActiveCategories()
    {
        return Category::where('is_active', true)->get();
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function createCategory($request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => true
        ]);
    }

    public function updateCategory($id, $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only(['name', 'description']));
    }

    public function deactivateCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = false;
        $category->save();
    }
}

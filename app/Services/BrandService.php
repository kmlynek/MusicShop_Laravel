<?php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    public function getActiveBrands()
    {
        return Brand::where('is_active', true)->get();
    }

    public function getBrandById($id)
    {
        return Brand::findOrFail($id);
    }

    public function createBrand($request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => true
        ]);
    }

    public function updateBrand($id, $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($request->only(['name', 'description']));
    }

    public function deactivateBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->is_active = false;
        $brand->save();
    }
}

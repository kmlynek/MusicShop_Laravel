<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $service;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $brands = $this->service->getActiveBrands();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $this->service->createBrand($request);
        return redirect('/brands');
    }

    public function edit($id)
    {
        $brand = $this->service->getBrandById($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->service->updateBrand($id, $request);
        return redirect('/brands');
    }

    public function destroy($id)
    {
        $this->service->deactivateBrand($id);
        return redirect('/brands');
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getActiveCategories();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->service->createCategory($request);
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = $this->service->getCategoryById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->service->updateCategory($id, $request);
        return redirect('/categories');
    }

    public function destroy($id)
    {
        $this->service->deactivateCategory($id);
        return redirect('/categories');
    }
}
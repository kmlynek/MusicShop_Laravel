<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Category;
use App\Models\Brand;


class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    // LISTA PRODUKTÓW
    public function index()
    {
        $products = $this->service->getActiveProducts();
        return view('products.index', ['products' => $products]);
    }

    // FORMULARZ DODAWANIA
    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();


        return view('products.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }


    // ZAPIS NOWEGO PRODUKTU
    public function store(Request $request)
    {
        $this->service->createProduct($request);
        return redirect('/products');
    }

    // FORMULARZ EDYCJI
    public function edit($id)
    {
        $product = $this->service->getProductById($id);
        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();


        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    // ZAPIS EDYCJI 
    public function update(Request $request, $id)
    {
        $this->service->updateProduct($id, $request);
        return redirect('/products');
    }

    // DEZAKTYWACJA (ZAMIENNIK DELETE)
    public function destroy($id)
    {
        $this->service->deactivateProduct($id);
        return redirect('/products');
    }
}

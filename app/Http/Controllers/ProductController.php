<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:100',
            'code'  => 'required|string|max:20|unique:products,code',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($data);

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($data);

        // Ini baris redirect yang ketinggalan
        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    } // <-- Kurung kurawal penutup ini yang tadi hilang!

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Berhubung lu bentar lagi masuk Step 12, ini sekalian gue isiin kodenya
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully.');
    }
} // Ini penutup class ProductController
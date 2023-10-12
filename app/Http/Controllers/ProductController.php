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
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        $response = ['message' => 'Product added successfully!'];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
    
        $product->update($request->all());
    
        $response = ['message' => 'Product updated successfully!'];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return response()->json(['message' => 'Product deleted successfully']);
    }
}

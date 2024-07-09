<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function store(Request $request)
    { 
       $validatedData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $validatedData['image'] = $imagePath;
    }

    Product::create($validatedData);

    return redirect()->route('products.index')->with('success', 'Ürün başarıyla eklendi.');
}
       
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    { 
        $product = new Product;
        $product->name = $request->name;
        
        $product->save();
        
        return response()->json(['success' => 'Ürün başarıyla eklendi']);
    }
}

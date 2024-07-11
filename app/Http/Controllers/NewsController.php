<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::latest()->take(3)->get();
        return view('home', compact('news'));
    }
    public function store(Request $request){

      $validated = $request->validate([
        'title' => 'required|max:255',
        'content' =>'required',
        'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);


      if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news', 'public');
        $validated['image'] = $imagePath;
    }

    News::create($validated);

    return redirect()->route('admin.news.index')->with('success', 'Haber başarıyla eklendi.');
}


       

    
}

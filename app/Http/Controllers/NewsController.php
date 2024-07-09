<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }
    public function store(Request $request){

      $validateData = $request->validate([
        'title' => 'required|max:255',
        'content' =>'required',
        'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);


      if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news', 'public');
        $validatedData['image'] = $imagePath;
    }

    News::create($validatedData);

    return redirect()->route('news.index')->with('success', 'Haber başarıyla eklendi.');
}


       

    
}

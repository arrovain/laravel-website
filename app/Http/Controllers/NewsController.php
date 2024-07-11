<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create() {
      return view('admin.news.create');
    }
    public function store(Request $request){

     
       $request->validate([
        'title' => 'required|max:255',
        'content' =>'required',
        'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

        News::create($request->all());

        return redirect()->route(news.index)->with('success','News created successfully');
    } 

    public function show(News $news) {
      return view('admin.news.show', compact('news'));
    }
    public function edit(News $news) {
     
  return view('admin.news.edit', compact('news'));
    }

  public function update(Request $request, News $news) {
    $request->validate([
      'title' => 'required|string|max:255',
      'content' =>'required',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news) {
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }



}


       

    


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function store(Request $request){

        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        return response()->json(['success' =>  'Haber başarıyla eklendi']);

    }
}

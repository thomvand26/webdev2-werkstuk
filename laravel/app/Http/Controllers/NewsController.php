<?php

namespace App\Http\Controllers;

use App\Article;

class NewsController extends Controller
{
    public function index($page = 1) {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        return view('news.index', [
            'articles' => $articles,
        ]);
    }

    public function show($slug) {
        $article = Article::where('slug', $slug)->first();
        if (!$article) abort('404');

        return view('news.detail', [
            'article' => $article,
        ]);
    }
}

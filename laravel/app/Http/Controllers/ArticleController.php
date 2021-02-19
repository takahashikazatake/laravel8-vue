<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    public function store(ArticleRequest $request, Article $article) {
        $article->body = $request->tweet;
        $article->user_id = $request->user()->id;
        $article->save();
    }
}

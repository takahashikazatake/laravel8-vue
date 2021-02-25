<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index() {
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }

    public function store(ArticleRequest $request, Article $article) {
        $article->body = $request->tweet;
        $article->user_id = $request->user()->id;
        $article->save();
    }

    public function destroy(Article $article) {
        $article->delete();
    }

    public function data() {
        $articles = Article::all();
        foreach($articles as $article) {
            $user_name = $article->user->name;
            $article->user_name = $user_name;
        }
        return $articles;
    }
}

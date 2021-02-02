<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //==========ここから追加==========
    public function index()
    {
        // ダミーデータ
        $articles = [
            (object) [
                'id' => 1,
                'title' => 'アパパパ',
                'body' => 'hogehoge',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'あらん',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => 'タイトル2',
                'body' => '本文2',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                ],
            ],
            (object) [
                'id' => 3,
                'title' => 'タイトル3',
                'body' => '本文3',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                ],
            ],
        ];

        return view('articles.index', ['articles' => $articles]);
    }
}

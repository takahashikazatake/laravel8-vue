@extends('layouts.app')
    
 @section('content')
   @auth
    <post-index-component 
      :user-name='@json(Auth::user())'
      :current-post='@json($articles)'
      >
    </post-index-component>
   @endauth
   @guest
      @foreach($articles as $article)
      <div class="container">
         <div class="card mb-2">
            <div class="card-header d-flex flex-row-reverse">
            </div>
            <div class="card-body">
               <div class="font-weight-bold">{{ $article->user->name }}</div>
               <div class="card-title mt-4">{{ $article->body }}</div>
               <div class="card-text mt-3">投稿日時 {{ $article->createdAt }}</div>
            </div>
         </div>
      </div>
      @endforeach
   @endguest
 @endsection

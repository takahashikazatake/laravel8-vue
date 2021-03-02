@extends('layouts.app')

@section('title', $user->name)

@section('content')
  <div class="container">
    <div class="card mt-3 mb-4">
      <div class="card-body">
        <div class="d-flex flex-row">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            <i class="fas fa-user-circle fa-3x"></i>
          </a>
        </div>
        <h2 class="h5 card-title m-0">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h2>
      </div>
      <div class="card-body">
        <div class="card-text">
          <a href="" class="text-muted">
            10 フォロー
          </a>
          <a href="" class="text-muted">
            10 フォロワー
          </a>
        </div>
      </div>
    </div>
    @foreach($articles as $article)
      @include('articles.post')
    @endforeach
  </div>
@endsection

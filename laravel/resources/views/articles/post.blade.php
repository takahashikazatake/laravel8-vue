<div class="container">
    <div class="card mb-2">
        <div class="card-header d-flex flex-row-reverse">
        </div>
        <div class="card-body">
            <div class="font-weight-bold">{{ $article->user->name }}</div>
            <div class="card-title mt-4">{{ $article->body }}</div>
            <div class="card-text mt-3">投稿日時 {{ $article->created_at }}</div>
        </div>
    </div>
</div>


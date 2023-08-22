@extends('test')

@section('title')
    Detail Page
@endsection

@section('content')
        <main role="main" class="col-md-8 ms-sm-auto px-md-4">
            <p class="lead"><a href="/" class="text-decoration-none mb-3">&larr; Go back to home page</a></p>
            <div class="card mb-4 bg-white shadow">
                <div class="card-header">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7GmssmFXZJHksEdf_DNqe_MRe_Vu4ugFtLnLmFFGF_Q&s" class="card-img-top" alt="Content Image" style="width: 250px; height: 200px;">
                    <h5 class="card-title">Title: {{ $article->title }}</h5>
                    <p class="text-muted">By <a href="/?author={{ $article->user->username }}">{{ $article->user->name  }}</a> | Category: <a href="/?category={{ $article->category->slug }}">{{ $article->category->name }}</a></p>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $article->body }}</p>
                </div>
            </div>
        </main>
@endsection

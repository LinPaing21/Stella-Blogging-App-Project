@extends('test')

@section('title')
    Home Page
@endsection

@section('content')
    <main role="main" class="col-md-9 ms-sm-auto px-md-2">
        <!-- Main content here -->
        <div class="row mx-5">
            @if ($articles->count())
                <!-- Loop through your blog posts and create card elements -->
                @foreach ($articles as $article)
                    <div class="col-md-9 col-lg-5 ms-5 card mb-4 p-2">
                        <div class="card-body">
                            <h5 class="card-title">Title: {{ $article->title }}</h5>
                            <p class="text-muted">By <a href="/?author={{ $article->user->username }}&{{ http_build_query(request()->only(['search', 'category'])) }}">{{ $article->user->name  }}</a>
                                 | Category: <a href="/?category={{ $article->category->slug }}&{{ http_build_query(request()->only(['search', 'author'])) }}">{{ $article->category->name }}</a></p>
                            <div class="card-subtitle mb-2 text-muted small">
                                {{ $article->created_at->diffForHumans() }}
                            </div>
                            <p class="card-text">{{ $article->excerpt }}...</p>
                            <a href="{{ url("/articles/$article->slug") }}" class="card-link">View Detail &raquo;</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center col-8 mt-3 border border-2 border-info"><i class="fa fa-times" aria-hidden="true"></i> No content yet! Please check back later!!</p>
            @endif
            {{ $articles->links() }}
        </div>
    </main>
@endsection

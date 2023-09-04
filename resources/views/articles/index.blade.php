@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('content')
@include('components.sidebar')
    <main role="main" class="col-md-9 ms-sm-auto mt-5 px-md-2">
        <!-- Main content here -->
        <div class="row mx-5">
            @if ($articles->count())
                <!-- Loop through your blog posts and create card elements -->
                @foreach ($articles as $article)
                    <div class="col-12 col-lg-6 card ms-lg-3 mb-4 p-0 bg-white">
                        <div class="card-header p-0">
                            <img src="{{ ($article->thumbnail)? asset('storage/' . $article->thumbnail) : asset('storage/thumbnails/default_photo.jpg') }}"  class="card-img-top w-100" alt="Content Image" height="200px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="text-muted mb-0">By <a href="/?author={{ $article->user->username }}&{{ http_build_query(request()->only(['search', 'category'])) }}">{{ $article->user->name  }}</a>
                                 | Category: <a href="/?category={{ $article->category->slug }}&{{ http_build_query(request()->only(['search', 'author'])) }}">{{ $article->category->name }}</a></p>
                            <div class="card-subtitle mb-2 text-muted small">
                                {{ $article->created_at->diffForHumans() }}
                            </div>
                            <p class="card-text">{{ $article->excerpt }}...</p>
                        </div>
                        <div class="card-footer">
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

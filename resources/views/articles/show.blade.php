@extends('layouts.app')

@section('css')
    @livewireStyles
@endsection

@section('title')
    Detail Page
@endsection

@section('content')
        <main role="main" class="col-md-10 mx-auto px-md-4 mt-5">
            <p class="lead"><a href="/" class="text-decoration-none mb-3">&larr; Go back to home page</a></p>
            <div class="card mb-4 p-0 bg-white shadow">
                <div class="card-header p-0">
                    <img src="{{ ($article->thumbnail)? asset('storage/' . $article->thumbnail) : asset('default_photo.jpg') }}" class="card-img-top w-100" alt="Content Image" height="350px">
                </div>
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between">
                        {{ $article->title }}
                        <div class="dropdown">
                            <a class="text-decoration-none float-end" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                &#8942;
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-flag" aria-hidden="true"></i> Report</a></li>
                                @if(auth()->user()?->username == $article->user->username || auth()->user()?->can('admin'))
                                    <li><a class="dropdown-item" href="{{ route('articles.edit', $article->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></li>
                                    <li>
                                        <form action="{{ route('articles.destroy', $article->id) }}" onclick="return confirm('Are you sure?')" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item"><i class="fa fa-trash"  aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </h5>

                    <p class="text-muted">By <a href="/?author={{ $article->user->username }}">{{ $article->user->name  }}</a> | Category: <a href="/?category={{ $article->category->slug }}">{{ $article->category->name }}</a></p>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <div class="card-text">{!! $article->body !!}</div>
                </div>
            </div>

            @livewire('comments', ['article' => $article])
        </main>
@endsection

@section('script')
    @livewireScripts
    <script src="{{ asset('js/comment.js') }}"></script>
@endsection

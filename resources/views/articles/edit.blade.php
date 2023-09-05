@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
<div class="container my-5">
    <h2 class="mb-3 ms-md-1 text-center text-md-start">Edit Article</h2>
    <div class="row justify-content-center">
        <div class="col-md-3 d-none d-md-block">
            <img src="https://i.pravatar.cc/60?u={{ $article->user_id }}" alt="" width="150" height="150" class="rounded">
            <p class="fw-bold fs-3">{{ $article->user->name }}</p>
        </div>
        {{-- create article form section --}}
        <div class="col-9 border border-2 border-warning shadow p-3 rounded">
            <form method="POST" action="/author/articles/{{ $article->id}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                    @error('title')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $article->slug) }}" required>
                    @error('slug')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Thumbnail</label>
                    <img src="{{ ($article->thumbnail)? asset('storage/' . $article->thumbnail) : asset('default_photo.jpg') }}" class="rounded d-block mb-1" alt="Content Image" width="150px" height="100px">
                    <input type="file" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Excerpt</label>
                    <textarea name="excerpt" class="form-control" required>{{ old('excerpt', $article->excerpt) }}</textarea>
                    @error('excerpt')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control" rows="10" required>{{ old('body', $article->body) }}</textarea>
                    @error('body')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-select">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $article->category->id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <input type="submit" value="Confirm" class="btn btn-primary">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection

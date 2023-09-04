@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-3 ms-md-1 text-center text-md-start">Create New Article</h2>
    <div class="row justify-content-center">
        <div class="col-md-3 d-none d-md-block">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="150" height="150" class="rounded">
            <p class="fw-bold fs-3">{{ auth()->user()->name }}</p>
        </div>
        {{-- create article form section --}}
        <div class="col-9 border border-2 border-warning shadow p-3 rounded">
            <form method="POST" action="/author/articles" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
                    @error('slug')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Excerpt</label>
                    <textarea name="excerpt" class="form-control" value="{{ old('excerpt') }}" required></textarea>
                    @error('excerpt')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control" rows="10" value="{{ old('body') }}" required></textarea>
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
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                <input type="submit" value="Add Article" class="btn btn-primary">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection

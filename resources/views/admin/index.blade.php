@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('css')
    <style>
        .sticky-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
        }

        @media screen and (min-width: 1580px) {
            .w3xl {
                width: 250px !important;
            }
        }

    </style>
@endsection

@section('content')
<div class="container-fluid my-3 bg-secondary">
    <div class="row">
        <x-admin-nav />

        {{-- This index page is hardcoded and need to repair --}}
        <main class="offset-2 col-10">
            @include('admin._dashboard')
            <hr>
            <x-user-table />
            <hr>
            <x-article-table />
            <hr>
            <x-category-table />
        </main>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Articles</h1>

        <!-- Eloquent Version -->
        <div class="mb-5">
            <h2>Eloquent Results</h2>
            @forelse ($eloquentPosts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <p class="text-muted">
                            By {{ $post->user->name }} in {{ $post->category->name }}
                        </p>
                        <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">No articles found!</div>
            @endforelse
        </div>

        <!-- Query Builder Version -->
        <div class="mb-5">
            <h2>Query Builder Results</h2>
            @forelse ($queryBuilderPosts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <p class="text-muted">
                            By {{ $post->author }} in {{ $post->category }}
                        </p>
                        <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">No articles found!</div>
            @endforelse
        </div>
    </div>
@endsection
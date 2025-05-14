@extends('layouts.app')

@section('content')
    <div class="container">
        @isset($eloquentPost)
            <!-- Eloquent Version -->
            <article>
                <h1>{{ $eloquentPost->title }}</h1>
                <div class="mb-4">
                    <span class="badge bg-secondary">{{ $eloquentPost->category->name }}</span>
                    @foreach($eloquentPost->tags as $tag)
                        <span class="badge bg-primary">{{ $tag->name }}</span>
                    @endforeach
                    <small class="text-muted">Posted by {{ $eloquentPost->user->name }}</small>
                </div>
                <p>{{ $eloquentPost->content }}</p>
            </article>
        @endisset

        @isset($queryBuilderPost)
            <!-- Query Builder Version -->
            <article>
                <h1>{{ $queryBuilderPost->title }}</h1>
                <div class="mb-4">
                    <span class="badge bg-secondary">{{ $queryBuilderPost->category }}</span>
                    <small class="text-muted">Posted by {{ $queryBuilderPost->author }}</small>
                </div>
                <p>{{ $queryBuilderPost->content }}</p>
            </article>
        @endisset

        <a href="{{ route('blog.index') }}" class="btn btn-light mt-3">Back to Articles</a>
    </div>
@endsection
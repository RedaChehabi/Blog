@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Top Articles (5+ Comments)</h1>

        @isset($eloquentPosts)
            <!-- Eloquent Version -->
            <div class="mb-5">
                @foreach($eloquentPosts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">
                                    {{ $post->comments_count }} Comments
                                </span>
                                <a href="{{ route('blog.show', $post->id) }}" class="btn btn-sm btn-primary">View Article</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset

        @isset($queryBuilderPosts)
            <!-- Query Builder Version -->
            <div class="mb-5">
                @foreach($queryBuilderPosts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">
                                    {{ $post->comments_count }} Comments
                                </span>
                                <a href="{{ route('blog.show', $post->id) }}" class="btn btn-sm btn-primary">View Article</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
@endsection

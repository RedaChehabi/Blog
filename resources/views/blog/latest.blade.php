@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Latest Articles</h1>

        @isset($eloquentPosts)
            <!-- Eloquent Version -->
            <div class="row mb-5">
                @foreach($eloquentPosts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $post->title }}</h5>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">{{ $post->category->name }}</span>
                                    @foreach($post->tags as $tag)
                                        <span class="badge bg-primary">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                <p class="text-muted">{{ Str::limit($post->content, 150) }}</p>
                                <div class="d-flex justify-content-between">
                                    <small>{{ $post->comments_count }} comments</small>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset

        @isset($queryBuilderPosts)
            <!-- Query Builder Version -->
            <div class="row mb-5">
                @foreach($queryBuilderPosts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $post->title }}</h5>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">{{ $post->category }}</span>
                                    @if(!empty($post->tags))
                                        @foreach(explode(',', $post->tags) as $tag)
                                            <span class="badge bg-primary">{{ $tag }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                <p class="text-muted">{{ Str::limit($post->content, 150) }}</p>
                                <div class="d-flex justify-content-between">
                                    <small>{{ $post->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Comments</h2>

        @isset($eloquentComments)
            <!-- Eloquent Version -->
            <div class="mb-5">
                @forelse ($eloquentComments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                            <small class="text-muted">By {{ $comment->user->name }}</small>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">No comments yet!</div>
                @endforelse
            </div>
        @endisset

        @isset($queryBuilderComments)
            <!-- Query Builder Version -->
            <div class="mb-5">
                @forelse ($queryBuilderComments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                            <small class="text-muted">By {{ $comment->author }}</small>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">No comments yet!</div>
                @endforelse
            </div>
        @endisset

        <a href="{{ route('blog.show', $id) }}" class="btn btn-light">Back to Article</a>
    </div>
@endsection
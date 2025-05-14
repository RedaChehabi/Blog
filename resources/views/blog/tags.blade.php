@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tags</h2>

        @isset($eloquentTags)
            <!-- Eloquent Version -->
            <div class="d-flex gap-2 mb-5">
                @forelse ($eloquentTags as $tag)
                    <span class="badge bg-primary">{{ $tag->name }}</span>
                @empty
                    <div class="alert alert-info">No tags associated!</div>
                @endforelse
            </div>
        @endisset

        @isset($queryBuilderTags)
            <!-- Query Builder Version -->
            <div class="d-flex gap-2 mb-5">
                @forelse ($queryBuilderTags as $tag)
                    <span class="badge bg-primary">{{ $tag->name }}</span>
                @empty
                    <div class="alert alert-info">No tags associated!</div>
                @endforelse
            </div>
        @endisset

        <a href="{{ route('blog.show', $id) }}" class="btn btn-light mt-3">Back to Article</a>
    </div>
@endsection
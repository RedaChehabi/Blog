@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users with Profiles</h1>

    @isset($eloquentUsers)
    <!-- Eloquent Version -->
    <div class="row mb-5">
        @foreach($eloquentUsers as $user)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->profile->bio ?? 'No bio available' }}</p>
                        <img src="{{ $user->profile->avatar ?? 'https://placehold.co/100x100' }}" 
                             class="img-thumbnail mb-2" alt="Avatar">
                        <div class="roles">
                            @foreach($user->roles as $role)
                                <span class="badge bg-secondary">{{ $role->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endisset

    @isset($queryBuilderUsers)
    <!-- Query Builder Version -->
    <div class="row mb-5">
        @foreach($queryBuilderUsers as $user)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->bio ?? 'No bio available' }}</p>
                        <img src="{{ $user->avatar ?? 'https://placehold.co/100x100' }}" 
                             class="img-thumbnail mb-2" alt="Avatar">
                        <a href="{{ route('blog.roles', $user->id) }}" class="btn btn-sm btn-info">View Roles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endisset
</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Roles</h1>

        @isset($eloquentRoles)
            <!-- Eloquent Version -->
            <div class="mb-5">
                <ul class="list-group">
                    @forelse ($eloquentRoles as $role)
                        <li class="list-group-item">{{ $role->name }}</li>
                    @empty
                        <li class="list-group-item">No roles assigned</li>
                    @endforelse
                </ul>
            </div>
        @endisset

        @isset($queryBuilderRoles)
            <!-- Query Builder Version -->
            <div class="mb-5">
                <ul class="list-group">
                    @forelse ($queryBuilderRoles as $role)
                        <li class="list-group-item">{{ $role->name }}</li>
                    @empty
                        <li class="list-group-item">No roles assigned</li>
                    @endforelse
                </ul>
            </div>
        @endisset

        <a href="{{ route('blog.withProfiles') }}" class="btn btn-light mt-3">Back to Users</a>
    </div>
@endsection
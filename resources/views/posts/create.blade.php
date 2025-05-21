<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control ">
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select id="category" name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <div class="text-danger">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
            </div>
            <div class="mb-4">
                <label for="user" class="form-label">User:</label>
                <select id="user" name="user_id" class="form-select">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                    <div class="text-danger">
                        {{ $errors->first('user_id') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags:</label>
                <select id="tags" name="tags[]" class="form-select" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('tags'))
                    <div class="text-danger">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary ms-2">Annuler</a>
        </form>
    </div>
</body>

</html>
</div>
</body>

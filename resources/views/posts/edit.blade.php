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
        <h1>Modifier Post</h1>

        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <label for="name" class="form-label">Nom du post</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" required>
            <br>
            <label for="content" class="form-label">Contenu</label>
            <textarea name="content" class="form-control" id="content" required>{{$post->content}}</textarea>
            <br>
            <label for="category" class="form-label">Catégorie</label>
            <select name="category_id" class="form-select" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <br>
            <label for="tags" class="form-label">Tags</label>
            <select name="tags[]" class="form-select" id="tags" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
        </form>
        <br>
        <a href="{{route('posts.index')}}" class="btn btn-secondary ms-2">Retour à la liste des posts</a>

    </div>

</body>

</html>

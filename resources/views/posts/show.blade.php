<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Info</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Post Info</h1>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Post ID:</strong> {{ $post->id }}</li>
            <li class="list-group-item"><strong>Post Name:</strong> {{ $post->name ?? $post->title }}</li>
            <li class="list-group-item"><strong>Created At:</strong> {{ $post->created_at }}</li>
            <li class="list-group-item"><strong>Updated At:</strong> {{ $post->updated_at }}</li>
        </ul>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary me-2">Retour à la liste des posts</a>
        <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-warning me-2">Modifier le post</a>
        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce post ?')">Supprimer le post</button>
        </form>
    </div>
</body>

</html>

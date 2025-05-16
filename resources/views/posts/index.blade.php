<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Posts</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">La liste des Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Ajouter Post</a>

        <form class="row g-3 mb-4">
            <div class="col-auto">
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un post">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->id }}</a>
                        </td>
                        <td>{{ $post->name ?? $post->title }}</td>
                        <td>
                            <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

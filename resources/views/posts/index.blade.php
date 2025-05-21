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


        <form class="row g-3 mb-4 align-items-center filter-form" method="GET" action="{{ route('posts.index') }}">
            <div class="col-md-2 col-sm-12 mb-2 mb-md-0">
                <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Ajouter Post</a>
            </div>
            <div class="col-md-3 col-sm-12 mb-2 mb-md-0">
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-2 mb-md-0">
                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
            </div>
            <div class="col-md-2 col-sm-12 mb-2 mb-md-0">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>category</th>
                    <th>user</th>
                    <th>show</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>
                            {{ $post->category->name }}
                        </td>
                        <td>
                            {{ $post->user->name }}
                        </td>
                        <td>
                            <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-success btn-sm">Show</a>
                        </td>
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

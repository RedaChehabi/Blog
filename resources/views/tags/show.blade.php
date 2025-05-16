<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tag Info</h1>
    <h2>Tag ID: {{ $tag->id }}</h2>
    <h2>Tag Name: {{ $tag->name }}</h2>
    <h2>Tag Created At: {{ $tag->created_at }}</h2>
    <h2>Tag Updated At: {{ $tag->updated_at }}</h2>

    <a href="{{ route('tags.index') }}">Retour à la liste des tags</a><br>
    <a href="{{ route('tags.edit', ['tag' => $tag]) }}">Modifier le tag</a><br>
    <form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer le tag</button>
    </form>


</body>
</html>

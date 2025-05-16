<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>La liste des Tags</h1>

    <a href="{{ route('tags.create') }}">Ajouter Tag</a>

    <form >
        <input type="text" name="search" id="search" placeholder="Rechercher un tag">
        <button type="submit">Rechercher</button>
    </form>

    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        @foreach ($tags as $tag)
            <tr>
                <th>
                    <a href="{{ route('tags.show', ['tag' => $tag]) }}">{{$tag->id}}</a>
                </th>
                <th>{{ $tag->name }}</th>
                <th>
                    <a href="{{ route('tags.edit', ['tag' => $tag]) }}">Edit</a>
                </th>
                <th>
                    <form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </table>

</body>

</html>

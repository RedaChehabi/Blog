<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Modifier Tag</h1>

    <form action="{{ route('tags.update',['tag'=>$tag]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom du tag</label>
        <input type="text" name="name" id="name" value="{{$tag->name}}" required>
        <button type="submit">Enregistrer</button>
    </form>

    <a href="{{route('tags.index')}}">Retour à la liste des tags</a>

</body>
</html>

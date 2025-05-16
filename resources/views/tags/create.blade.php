<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un Tag</h1>

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <label for="name">Nom du tag</label>
        <input type="text" name="name" id="name">
        <button type="submit">Ajouter</button>
    </form>

    <a href="{{route('tags.index')}}">Retour à la liste des tags</a>

</body>
</html>

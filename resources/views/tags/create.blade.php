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
        <h1>Ajouter un Tag</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <h4>Erreur</h4>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tags.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
            @csrf
            <label for="name" class="form-label">Nom du tag</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            <br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <a href="{{route('tags.index')}}" class="btn btn-secondary ms-2">Retour à la liste des tags</a>
    </div>


</body>

</html>

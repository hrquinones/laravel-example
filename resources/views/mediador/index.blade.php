
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediadores</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">Mediadores</h1>
        <ul class="list-group mt-4">
            @foreach ($mediadores as $mediador)
                <li class="list-group-item">{{ $mediador->first_name }} (ID: {{ $mediador->id }})</li>
            @endforeach
        </ul>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>

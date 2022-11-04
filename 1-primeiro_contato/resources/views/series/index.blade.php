<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Controle de Series</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/4ae73dd616.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <h1> ola mundo series</h1>
    </div>
    <br>

    <div class="container">
        @if (!empty($mensagem))
            <div class="alert alert-success" role="alert">
                {{ $mensagem }}
            </div>
        @endif

        <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group">
            @foreach ($series as $serie)
                <li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->nome }}
                    <form method="post" action="/series/remover/{{ $serie->id }}"
                        onsubmit="return confirm('tem certeza?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>

    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Adicionar Series </title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>
<body>

    <div class="container">
        <h1> Adicionar Series</h1>
    </div>
    <br>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome"> Nome </label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="col col-2">
                <label for="qtd_temporadas"> Numero de temporadas </label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>
            <div class="col col-2">
                <label for="qtd_episodios"> Numero de Episodios </label>
                <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios">
            </div>
        </div>
        <br>
        <button class="btn btn-primary"> Adicionar </button>
    </form>
    </div>
</body>
</html>

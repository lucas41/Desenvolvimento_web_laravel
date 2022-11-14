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
    <br><Br>
    <div class="container">
        <h1> Temporadas de {{$serie->nome}}</h1>
    </div>
    <br>

        <div class="container">
        <ul class="list-group">
           @foreach($temporadas as $temporada)
           <li class="list-group-item">Temporada {{$temporada->numero}}</li>
           @endforeach
        </ul>
    </div>

    </div>

</body>

</html>

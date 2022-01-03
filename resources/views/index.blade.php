<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <title>Music api</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-2 mb-2">Введите ваш запрос</h1>
            <form class="form-control" action="{{route('getJson')}}" method="get">
                @csrf
                <label for="query">Параметр query</label>
                <input id="=query" name="query" type="text">
                <label for="limit">Количество результатов</label>
                <input id="=limit" name="limit" type="number">
                <button class="btn-info btn" type="submit">Отправить</button>
            </form>
            @if(isset($hash))
    <span>Hash: </span>{{$hash}}
                @endif
        </div>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="/js/bootstrap.bundle.min.js"> </script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>


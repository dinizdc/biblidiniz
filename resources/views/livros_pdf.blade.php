<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros PDF</title>
    <!-- Fonts -->

    <link href=" {{ public_path('/resources/css/tailwind.min.css') }}" rel="stylesheet">

    <link href=" {{ public_path('/resources/css/bootstrap_v5_1_3.min.css') }}" rel="stylesheet">

    <style>
        .pagenum:before {
            content: counter(page);
        }

        header {
            /* add some css */
        }

    </style>


</head>

<body>
    Lista de livros em formato pdf
    <header>
        <span class="pagenum"></span>
    </header>
    <hr>
    @foreach ($livros as $livro)
        <div class="container mt-3">
            <div class="d-flex border p-3">
                <img src="{{ public_path('/resources/fotos/') }}/{{ $livro->src }}" alt="{{ $livro->alt }}"
                    class="flex-shrink-0 me-3 mt-3 rounded-circle" style="width:60px;height:60px;">
                <div>
                    <h4><strong>{{ $livro->titulo }}</strong><small>, {{ $livro->edicao }}ª edição,
                            {{ $livro->ano }}</small>
                    </h4>
                    <p>{{ $livro->subtitulo }}</p>
                    <p>ISBN: {{ $livro->isbn }}</p>
                </div>

            </div>
            <hr>
        </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    
</body>

</html>

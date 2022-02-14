<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Livros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('resources/css/tailwind.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        @foreach ($livros as $livro)
            {{-- <tr>
                <th scope="row">{{ $livro->id }}</th>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->subtitulo }}</td>
                <td>{{ $livro->isbn }}</td>
                <td>{{ $livro->ano }}</td>
                <td>{{ $livro->edicao }}</td>
                {{-- <td><img src="{{ asset('resources/img/capa.jpeg') }}" /></td> --}}
            {{-- <td>
                    <figure class="figure">
                        <img src="{{ asset('resources/img/capa.jpeg') }}" class="figure-img img-fluid rounded"
                            alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption text-right">A caption for the above image.
                        </figcaption>
                    </figure>
                </td>
            </tr> --}}

            <div class="container mt-3">
                <div class="d-flex border p-3">
                    <img src="{{ asset('resources/img/capa.jpeg') }}" alt="John Doe"
                        class="flex-shrink-0 me-3 mt-3 rounded-circle" style="width:60px;height:60px;">
                    <div>
                        <h4>{{ $livro->titulo }}<small>, {{ $livro->edicao }}ª edição, {{ $livro->ano }}</small></h4>
                        <p>{{ $livro->subtitulo }}</p>
                        <p>ISBN: {{ $livro->isbn }}</p>
                    </div>
                </div>
            </div>


        @endforeach
        <hr>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Subtítulo</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Edição</th>
                    <th scope="col">Capa</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr>
                        <th scope="row">{{ $livro->id }}</th>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->subtitulo }}</td>
                        <td>{{ $livro->isbn }}</td>
                        <td>{{ $livro->ano }}</td>
                        <td>{{ $livro->edicao }}</td>
                        {{-- <td><img src="{{ asset('resources/img/capa.jpeg') }}" /></td> --}}
                        <td>
                            <figure class="figure">
                                <img src="{{ asset('resources/img/capa.jpeg') }}"
                                    class="figure-img img-fluid rounded"
                                    alt="A generic square placeholder image with rounded corners in a figure.">
                                <figcaption class="figure-caption text-right">A caption for the above image.
                                </figcaption>
                            </figure>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="pagination pagination-sm justify-content-center">
            {{ $livros->links() }}
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                {{ $livros->links('pagination::tailwind') }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {{ $livros->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

</body>

</html>

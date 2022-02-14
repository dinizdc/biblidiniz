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

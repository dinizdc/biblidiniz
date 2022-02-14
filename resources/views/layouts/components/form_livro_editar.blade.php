<form class="row g-3" action={{ route('livros.atualizar') }} method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value = {{$livro->id}}>
    @csrf
    <div class="col-md-6">
        <label for="inputTitulo" class="form-label">Título</label>
        <input name="titulo" value="{{$livro->titulo ?? old('titulo') }}" type="text" class="form-control" id="inputTitulo">
        @if ($errors->has('titulo'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('titulo') }}
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <label for="inputSubtitulo" class="form-label">Subtítulo</label>
        <input name="subtitulo" value="{{$livro->subtitulo ?? old('subtitulo') }}" type="text" class="form-control" id="inputSubtitulo">
    </div>
    <div class="col-md-3">
        <label for="inputIsbn" class="form-label">ISBN</label>
        <input name="isbn" value="{{$livro->isbn ?? old('isbn') }}" type="text" class="form-control" id="inputIsbn">
        @if ($errors->has('isbn'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('isbn') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <label for="inputNumeroPaginas" class="form-label">Número de páginas</label>
        <input name="paginas" value="{{$livro->paginas ?? old('paginas') }}" type="number" class="form-control"
            id="inputNumeroPaginas">
        @if ($errors->has('paginas'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('paginas') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <label for="inputAno" class="form-label">Ano</label>
        <input name="ano" value="{{$livro->ano ?? old('ano') }}" type="number" class="form-control" id="inputAno">
        @if ($errors->has('ano'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('ano') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <label for="inputEdicao" class="form-label">Edição</label>
        <input name="edicao" value="{{$livro->edicao ?? old('edicao') }}" type="number" class="form-control" id="inputEdicao">
        @if ($errors->has('edicao'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('edicao') }}
            </div>
        @endif
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

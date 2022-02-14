<form class="row g-3" action={{ route('livros.salvar') }} method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label for="inputTitulo" class="form-label">Título</label>
        <input name="titulo" value="{{ old('titulo') }}" type="text" class="form-control" id="inputTitulo">
        @if ($errors->has('titulo'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('titulo') }}
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <label for="inputSubtitulo" class="form-label">Subtítulo</label>
        <input name="subtitulo" value="{{ old('subtitulo') }}" type="text" class="form-control" id="inputSubtitulo">
    </div>
    <div class="col-md-3">
        <label for="inputIsbn" class="form-label">ISBN</label>
        <input name="isbn" value="{{ old('isbn') }}" type="text" class="form-control" id="inputIsbn">
        @if ($errors->has('isbn'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('isbn') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <label for="inputNumeroPaginas" class="form-label">Número de páginas</label>
        <input name="paginas" value="{{ old('paginas') }}" type="number" class="form-control"
            id="inputNumeroPaginas">
        @if ($errors->has('paginas'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('paginas') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <label for="inputAno" class="form-label">Ano</label>
        <input name="ano" value="{{ old('ano') }}" type="number" class="form-control" id="inputAno">
        @if ($errors->has('ano'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('ano') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <label for="inputEdicao" class="form-label">Edição</label>
        <input name="edicao" value="{{ old('edicao') }}" type="number" class="form-control" id="inputEdicao">
        @if ($errors->has('edicao'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('edicao') }}
            </div>
        @endif
    </div>
    <div class="col-md-4">
        <label for="inputAlt" class="form-label">nome da imagem</label>
        <input name="texto_alt" value="{{ old('texto_alt') }}" type="text" class="form-control" id="inputAlt">
        @if ($errors->has('texto_alt'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('texto_alt') }}
            </div>
        @endif
    </div>
    <div class="col-md-8">
        <label for="inputSrc" class="form-label">Fonte da imagem</label>
        <input name="imagem_src" value="{{ old('imagem_src') }}" type="file" class="form-control" id="inputSrc">
         @if ($errors->has('imagem_src'))
            <div class="text-danger" role="alert">
                <strong>*</strong> {{ $errors->first('imagem_src') }}
            </div>
        @endif
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

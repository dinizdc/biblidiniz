<form class="d-flex" action={{ route('livros.listar') }} method="get">
    @csrf
    <input name="termo" class="form-control me-2" type="search" placeholder="título, subtítulo, isbn ..."
        aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
</form>

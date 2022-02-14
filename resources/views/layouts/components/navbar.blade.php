<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('livros.home') }}">
            <img src="{{ asset('resources/img/geral.svg') }}" alt="" width="30" height="24">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Livros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('livros.listar') }}">Listar</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('livros.cadastrar') }}">Novo</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('pdf') }}" target="_blank">Listar PDF</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre o BibliDiniz</a>
                </li>

            </ul>
            @component('layouts.components.form_pesquisa') @endcomponent
            <div>
                {{-- DIV USUÁRIO --}}
                <div >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                
                                <img src="{{ asset('resources/img/user.svg') }}" alt="" width="30" height="24">
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                
                                <li><a class="dropdown-item" href="{{ route('livros.listar') }}">Dados</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('livros.sair') }}">Sair</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</nav>

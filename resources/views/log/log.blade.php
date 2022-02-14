@extends('layouts.page')

@section('titulo')
    Lista de Logs de Acesso ao Sistema
@stop

@section('conteudo')
    <p clas="ajax-res"></p>    
   

    @if (!empty($termo))
        <div class="alert alert-info"> Pesquisando por :{{ $termo }}</div>
        @component('layouts.components.lista_livros_tabela', ['livros' => $livros, 'termo' => $termo])
        @endcomponent
    @else
        @component('layouts.components.lista_livros_tabela', ['livros' => $livros])
        @endcomponent
    @endif

    @if ($logs)
        <div class="row">
            <div class="col-md-12">
                {{ $livros->appends(['termo' => $termo])->links() }}
            </div>
        </div>
        <hr>
    @endif
@stop

@extends('layouts.page')

@section('titulo')
    Lista de livros
@stop

@section('conteudo')
    <p clas="ajax-res"></p> 
    @if (!empty($msg))   
        <div class="alert alert-success"> {{ $msg }}</div>
    @endif
    @if (!empty($termo) && empty($msg))
        <div class="alert alert-info"> Pesquisando por :{{ $termo }}</div>
        @component('layouts.components.lista_livros_tabela', ['livros' => $livros,'termo' => $termo])
        @endcomponent
    @else
        @component('layouts.components.lista_livros_tabela', ['livros' => $livros,'msg'=>$msg])
        @endcomponent
    @endif

    @if ($livros)
        <div class="row">
            <div class="col-md-12">
                {{ $livros->appends(['termo' => $termo])->links() }}
            </div>
        </div>
        <hr>
    @endif
@stop

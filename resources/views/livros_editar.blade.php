@extends('layouts.page')

@section('titulo')
    Editar {{$livro->titulo}}
@stop

@section('conteudo')
    @component('layouts.components.form_livro_editar',['livro'=>$livro]) @endcomponent
@stop

@extends('layouts.page')

@section('titulo')
    Lista de livros
@stop

@section('conteudo')
    @component('layouts.components.form_livro') @endcomponent
@stop

@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Excluir Receita</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/receitas/listar') }}"> Pesquisa de Receitas</a></li>
            </ul>
        </div>
        <div class="tile">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
            <div class="tile-body">
                <form action="{{ url('/receitas/excluir', $registro->id) }}" method="POST">
                    @csrf
                    @include('receitas.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Excuir Usuário
                        </button>
                        <a href="{{ url('/receitas/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Exclusão</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
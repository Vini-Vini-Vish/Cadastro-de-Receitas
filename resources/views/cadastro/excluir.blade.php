@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Excluir Usuario</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/cadastro/listar') }}"> Pesquisa de Usuários</a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <form action="{{ url('/cadastro/excluir') }}" method="POST">
                    @csrf
                    @include('cadastro.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados
                        </button>
                        <a href="{{ url('/cadastro/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Exclusão de Cadastro</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

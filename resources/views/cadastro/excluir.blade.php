@extends('layouts.app')

@section('content')

    <div class="container">

        @include('cadastro.__apptitulo')

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

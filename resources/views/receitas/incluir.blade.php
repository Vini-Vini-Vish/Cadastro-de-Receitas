@extends('layouts.app')

@section('content')

    <div class="container">

        @include('receitas.__apptitulo')

        <div class="tile">
            <div class="tile-body">

                <form action="{{ url('/receitas/salvar') }}" method="POST">
                    @csrf
                    @include('receitas.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados
                        </button>
                        <a href="{{ url('/receitas/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Inclusão de Receita</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

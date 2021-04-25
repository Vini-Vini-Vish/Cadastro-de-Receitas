@extends('layouts.app')

@section('content')

    <div class="container">

        @include('receitas.__apptitulo')

        <div class="tile">
            <div class="tile-body">

                <form action="{{url('receitas/listar')}}" method="GET">
                    @csrf
                    @include('receitas.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Listagem
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

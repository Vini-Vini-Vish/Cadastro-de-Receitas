@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="app-title">

            <h1>
                <i class="fa fa-edit">Lista de Usuarios</i>
            </h1>
        
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Menu Principal</a></li>
            </ul>
        
        </div>
    </div>

    <div claas="container">
        <div class="tile">
            <div class="tile-body">
                <form class="form-inline" method="POST" action="{{ url('/cadastro/pesquisar') }}">
                    @csrf
                    <div class="col-sm-12"> --}}
                        <div class="form-grup">
                            <label class="control-label col-sm-1">Pesquisar:</label> <input type="text"
                                class="form-control col-sm-9" id="nome" name="nome"
                                placeholder="Digite um nome para pesquisar" value="{{ $filters['nome'] ?? '' }}" />
                            <div class="col-sm-2"> --}}
                                <button type="submit" class="btn btn-primary">
                                    OK <i class="fa fa-search-plus"></i>
                                </button>
                            </div> 
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <div id="no-more-tables">
                    <table class="table table-striped table-bordered table-hover cf">

                        <thead class="cf">
                            <tr>
                               <th>Foto</th>
                               <th>ID</th>
                               <th>Nome</th>
                               <th>Email</th> 
                               <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($registros as $registro)
                                <tr>
                                    <td>
                                        @if (isset($registro->profile_pic))
                                            <img src="{{ url('/thumbnail', $registro->profile_pic) }}" class="img-avatar" />
                                        @else
                                            <img src="{{ url('/thumbnail', 'boy.png') }}" class="img-avatar" />
                                        @endif 
                                    </td>
                                    <td>{{ $registro->id    }}</td>
                                    <td>{{ $registro->nome  }}</td>
                                    <td>{{ $registro->email }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ url('cadastro/alterar', $registro->id   )}}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm" href="{{ url('cadastro/excluir', $registro->id   )}}"><i class="fa fa-trash"></i></a>
                                        <a class="btn btn-warning btn-sm" href="{{ url('cadastro/consultar', $registro->id )}}"><i class="fa fa-address-book"></i></a>
                                    </td>
                                </tr>                              
                            @endforeach 
                        </tbody>
                        
                    </table>

                    @if (@isset($filters)){
                        {{ $registros->appends($filters)->links() }}
                        }
                    @else
                        {{ $registros->links() }}

                    @endisset

                   <a class="btn btn-sucess btn-lg" href="{{ url('cadastro/incluir') }}">Incluir<i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection
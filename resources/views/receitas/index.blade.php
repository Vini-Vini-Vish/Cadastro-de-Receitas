@extends('layouts.app')
@section('content')
    <div class="conteiner">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Receitas</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Menu Principal</a></li>
            </ul>

        </div>
    </div>

    <div class="tile">
        <div class="tile-body">
            <form class="form-inline" method="POST" action="{{ url('/receitas/pesquisar') }}">
                @csrf
                {{-- <div class="col-sm-12"> --}}
                    {{-- <div class="form-grup"> --}}
                        <label class="control-label col-sm-1">Pesquisar:</label> <input type="text"
                            class="form-control col-sm-9" id="nome_receita" name="nome_receita"
                            placeholder="Digite um nome da receita para pesquisar" value="{{ $filters['nome_receita'] ?? '' }}" />
                        {{-- <div class="col-sm-2"> --}}
                            <button type="submit" class="btn btn-primary">
                                OK <i class="fa fa-search-plus"></i>
                            </button>
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            </form>
        </div>
    </div>

    <div class="container">
        <div class="tile">
            <div class="title-body">
                <div id="no-more-tables">
                    <table class="table table-striped table-bordered table-hover cf">
                        <thead class="cf">
                            <tr>
                                <th>Id</th>
                                <th>Autor da Receita</th>
                                <th>Nome da Receita</th>
                                <th>Descrição </th>
                                <th>Tempo de Preparo</th>
                                <th>Rendimento</th>
                                <th>Lista de Ingredientes</th>
                                <th>Método de Preparo</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)
                                <tr>
                                    <td>{{$registro->id}}</td>
                                    <td>{{$registros->cadastro->nome}}</td>
                                    <td>{{$registro->nome_receita}}</td>
                                    <td>{{$registro->descricao}}</td>
                                    <td>{{$registro->tempo_preparo}}</td>
                                    <td>{{$registro->rendimento}}</td>
                                    <td>{{$registro->lista_ingredientes}}</td>
                                    <td>{{$registro->metodo_preparo}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" 
                                            href ="{{url('receitas/alterar', $registro->id)}}"><i 
                                            class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm" 
                                            href ="{{url('receitas/excluir',$registro->id)}}"><i 
                                            class="fa fa-trash"></i></a>
                                        <a class="btn btn-warning btn-sm" 
                                            href ="{{url('receitas/consultar',$registro->id)}}"><i 
                                            class="fa fa-address-book"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                      @if (@isset($filters))
                        {{ $registros->appends($filters)->links() }}
                    @else
                        {{ $registros->links() }}
                    @endisset
                    <a class="btn btn-sucess btn-lg" href="{{ url('/receitas/incluir') }}">Incluir<i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    @endsection

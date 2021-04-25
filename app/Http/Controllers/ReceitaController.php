<?php

namespace App\Http\Controllers;

use App\Models\Receitas;
use Illuminate\Http\Request;
use Illuminate\Cache\Repository;
use App\http\Requests\ReceitaRequest;

class ReceitaController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Receitas $receitas)
    {
        $this->repository = $receitas;
        $this->request = $request;
    }

    // ------------------------------------Listar Usuarios----------------------------------------------------- //

    public function index(Request $request){
        //$registros = Receitas::all();
        //$registros = Receitas::paginate(10); //caso não ponha o numero 10, ficara por padrão 15
        $registros = $this->repository->paginate(10);
        return view('receitas.index', [
            'registros' => $registros
        ]);
    }

    // ------------------------------------Pesquisar Usuarios----------------------------------------------------- //

    public function search(Request $request){
        $filters = $request->all();
        $registros = $this->repository->search($request->nome_receita);

        return view('receitas.index', [
            'registros'=>$registros,
            'filters'=>$filters,
        ]);
    }

    // ------------------------------------Incluir Usuarios----------------------------------------------------- //

    //retorna a pagina para cadastrar um novo usuario
    public function new()
    {
        return view('receitas.incluir');
    }

    //salvar o registro de um novo usuario
    public function create(ReceitaRequest $request)
    {
        $registro = $request->all();
        $this->repository->create($registro);
        return redirect()->route('receitas.listar')->with('success', 'Registro Cadastrado com sucesso!');
    }

    // ------------------------------------Alterar Usuarios----------------------------------------------------- //
    
    //retorna o registro de um usuario para alteração dos dados
    public function update( $id)
    {
        $registro = $this->repository->find($id);

        if(!$registro)
        {
            return redirect()->back();
        }

        return view('receitas.alterar', [
            'registro' => $registro,
        ]);
    }

    //alterar o registro modificado
    public function save(ReceitaRequest $request, $id)
    {
        $data = $request->all();
        $registro = $this->repository->find($id);     
        $registro->update($data);
        return redirect()->route('receitas.listar')->with('success', 'Registro Alterado com sucesso!');
    }

    // ------------------------------------Excluir Usuarios----------------------------------------------------- //

    //retorna o registro de um usuario para exclusão
    public function delete( $id)
    {
        $registro = $this->repository->find($id);

        if(!$registro)
        {
            return redirect()->back();
        }

        return view('receitas.excluir', [
            'registro' => $registro,
        ]);
    }

    //excluir o registro do usuario
    public function excluir( $id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('receitas.listar')->with('success', 'Registro Excluído com sucesso!');;
    }

    // ------------------------------------Consultar Usuarios----------------------------------------------------- //

    //retorna o registro para consulta/vizualização na tela 
    public function view($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro)
        {
            return redirect()->back();
        }

        return view('receitas.consultar', [
            'registro' => $registro,
        ]);
    }

    // ------------------------------------Cancelar Operação----------------------------------------------------- //
    
    //cancela a operação do usario
    public function cancel()
    {
        return redirect()->route('receitas.listar');
    }

    

    

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Cadastro $cadastro)
    {
        $this->repository = $cadastro;
        $this->request = $request;
    }

    //retorna a pagina de listagem de usuarios    
    public function index(Request $request)
    {    
        $registros = $this->repository->all();
        return view('cadastro.index', [
            'registros' => $registros,
        ]);
    }

    //retorna a pagina para cadastrar um novo usuario
    public function new()
    {
        return view('cadastro.incluir');
    }

    //salvar o registro de um novo usuario
    public function create(Request $request)
    {
        return view('cadastro.index');
    }

    //retorna o registro de um usuario para alteração dos dados
    public function update( $id)
    {
        $registro = $this->repository->find($id);

        if(!$registro)
        {
            return redirect()->back();
        }

        return view('cadastro.alterar', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro de um usuario para exclusão
    public function delete( $id)
    {
        $registro = $this->repository->find($id);

        if(!$registro)
        {
            return redirect()->back();
        }

        return view('cadastro.excluir', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro para consulta/vizualização na tela 
    public function view($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro)
        {
            return redirect()->back();
        }

        return view('cadastro.consultar', [
            'registro' => $registro,
        ]);
    }

    //alterar o registro modificado
    public function save(Request $request, $id)
    {
        return view('cadastro.listar');
    }

    //excluir o registro do usuario
    public function excluir(Request $request, $id)
    {
        return view('cadastro.listar');
    }

    //cancela a operação do usario
    public function cancel()
    {
        return redirect()->route('cadastro.listar');
    }
}
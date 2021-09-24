<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Cache\Repository;
use App\Http\Requests\CadastroRequest;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Cadastro $cadastro)
    {
        $this->repository = $cadastro;
        $this->request = $request;
    }

    public function index(Request $request)
    {
        //$this->out->writeln("Hello from Terminal");

        //$registros = $this->repository->paginate();

        //DB::table('usuarios')->paginate();

        $paginaAtual = $request->get('paginaAtual') ? $request->get('paginaAtual') : 1;
        $pageSize    = $request->get('pageSize') ? $request->get('pageSize') : 5;
        $dir         = $request->get('dir') ? $request->get('dir') : "asc";
        $props       = $request->get('props') ? $request->get('props') : "id";
        $search      = $request->get('search') ? $request->get('search') : "";

        if (empty($search)){
            $query = DB::table('cadastro')->select('*')->orderBy( $props, $dir);   
        } else {
            $query = DB::table('cadastro')->where('nome', 'LIKE','%'.$search.'%')
                                        //->orWhere('email','LIKE','%'.$search.'%')
                                        ->orderBy( $props, $dir); 
        } 

        $total = $query->count();

        $registros = $query->offset(($paginaAtual-1) * $pageSize)->limit($pageSize)->get();

        return response()->json([
            'data'        =>$registros,
            'paginaAtual' =>$paginaAtual-1,
            'pageSize'    =>$pageSize,
            'paginaFim'   =>ceil($total/$pageSize),
            'total'       =>$total,
        ]);
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $registros = $this->repository->search($request->nome);

        return view('cadastro.index', [
            'registros' => $registros,
            'filters' => $filters,
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
        $registro = $request->all();

        if (empty($registro['profile_pic'])){
            $registro['profile_pic']='boy.png';
        }

        $this->repository->create($registro);
        return redirect()->route('cadastro.listar');
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
    public function save(CadastroRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
        $registro->update($data);
        return redirect()->route('cadastro.listar');
    }

    //excluir o registro do usuario
    public function excluir(Request $request, $id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('cadastro.listar');
    }

    //cancela a operação do usario
    public function cancel()
    {
        return redirect()->route('cadastro.listar');
    }
}
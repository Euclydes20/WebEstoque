<?php

namespace WebEstoque\Http\Controllers;

use WebEstoque\Models\Classifications;
use Illuminate\Http\Request;
use Auth;

class ClassificationController extends Controller
{
    /**
    * ------------------------------------------------------------------------
    * Somente usuários autenticados poderão acessar os métodos do
    * controller
    * ------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtém todos os registros da tabela de classificação
        $classifications = Classifications::orderBy('id', 'desc')->paginate(6);

        // Chama a view passando os dados retornados da tabela
        return view(
            'classifications.index',
            [
                'classifications' => $classifications
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cria as regras de validação dos dados do formulário
        $rules = [
            'descricao' => 'required|min:5|max:30'
        ];
        
        // Cria o array com as mensagens de erros
        $messages = [
            'descricao.unique' => 'A classificação deve ser única em toda a tabela'
        ];
        
        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules, $messages);
        
        // Cria um novo registro
        $classification = new Classifications;
        $classification->descricao = $request->descricao;
        
        // Salva os dados na tabela
        $classification->save();
        
        // Retorna para view index com uma flash message
        return redirect()
            ->route('classifications.index')
            ->with('status', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Localiza e retorna os dados de um registro pelo ID
        $classification = Classifications::findOrFail($id);

        // Chama a view para exibir os dados na tela
        return view(
            'classifications.show',
            [
                'classification' => $classification
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Localiza o registro pelo seu ID
        $classification = Classifications::findOrFail($id);

        // Chama a view com o formulário para edição do registro
        return view(
            'classification.edit',
            [
                'classification' => $classification
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cria as regras de validação dos dados do formulário
        $rules = [
            'descricao' => 'required|string|unique:classifications|min:5|max:30'
        ];
    
        // Cria o array com as mensagens de erros
        $messages = [
            'descricao.unique' => 'A classificação deve ser única em toda a tabela'
        ];
     
        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules, $messages);
     
        // Cria um novo registro
        $classification = Classifications::findOrFail($id);
        $classification->descricao = $request->descricao;
     
        // Salva os dados na tabela
        $classification->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('classifications.index')
            ->with('status', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retorna o registro pelo ID fornecido
    $classification = Classifications::findOrFail($id);
 
    // Exclui o registro da tabela
    $classification->delete();
 
    // Retorna para view index com uma flash message
    return redirect()
        ->route('classifications.index')
        ->with('status', 'Registro excluído com sucesso!');
    }
}

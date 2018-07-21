<?php

namespace App\Http\Controllers;
use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::all();
        return view ('create2', compact('alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['datan']= implode('-', array_reverse(explode('/', $dados['datan'])));
        $dados['datac']= implode('-', array_reverse(explode('/', $dados['datac'])));
        Aluno::create($dados);
        return back()->with(['sucess'=>'Aluno cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $alunos = Aluno::all();
        return view ('listar1', compact('alunos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_ALUNO)
    {
        $aluno = Aluno::findOrFail($ID_ALUNO);

        return view ('edita', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_ALUNO)
    {
        $aluno = $request->all();
        $aluno['datac']= implode('-', array_reverse(explode('/', $aluno['datac'])));
        $aluno['datan']= implode('-', array_reverse(explode('/', $aluno['datan'])));
        $ID_ALUNO = Aluno::findOrFail($ID_ALUNO);
        $ID_ALUNO->update($aluno);

        return back()->with(['sucess' => 'Dados Atualizados com Sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_ALUNO)
    {
        $ALUNO_DELETE = Aluno::findOrFail($ID_ALUNO);
        $ALUNO_DELETE->delete($ID_ALUNO);
        return back()->with(['sucess' => 'Aluno Excluído com sucesso!']);
    }
}

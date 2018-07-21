<?php

namespace App\Http\Controllers;
use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
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
        $professores = Professor::all();
        return view ('create', compact('professores'));
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
        $dados['DATA_N']= implode('-', array_reverse(explode('/', $dados['DATA_N'])));
        $dados['DATA_C']= implode('-', array_reverse(explode('/', $dados['DATA_C'])));
        Professor::create($dados);
        return back()->with(['success'=>'Professor Cadastrado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $professores = Professor::all();
        return view ('listar', compact('professores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_PROFESSOR)
    {
        $professor = Professor::findOrFail($ID_PROFESSOR);

        return view ('edita3', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_PROFESSOR)
    {
        $professor = $request->all();
        $professor['DATA_C']= implode('-', array_reverse(explode('/', $professor['DATA_C'])));
        $professor['DATA_N']= implode('-', array_reverse(explode('/', $professor['DATA_N'])));
        $ID_PROFESSOR = Professor::findOrFail($ID_PROFESSOR);
        $ID_PROFESSOR->update($professor);

        return back()->with(['sucess' => 'Dados Atualizados com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_PROFESSOR)
    {
        $PROFESSOR_DELETE = Professor::findOrFail($ID_PROFESSOR);
        $PROFESSOR_DELETE->delete($ID_PROFESSOR);
        return back()->with(['sucess' => 'Professor Excluído com Sucesso!']);
    }
}

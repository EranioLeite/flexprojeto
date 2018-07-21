<?php

namespace App\Http\Controllers;
use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
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
        $cursos = Curso::all();
        return view ('create3', compact('cursos'));
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
        $dados['DATA_C']= implode('-', array_reverse(explode('/', $dados['DATA_C'])));
        Curso::create($dados);
        return back()->with(['sucess'=>'Curso cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cursos = Curso::all();
        return view ('listar3', compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_CURSO)
    {
        $curso = Curso::findOrFail($ID_CURSO);

        return view ('edita2', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_CURSO)
    {
        $curso = $request->all();
        $curso['DATA_C']= implode('-', array_reverse(explode('/', $curso['DATA_C'])));
        $ID_CURSO = Curso::findOrFail($ID_CURSO);
        $ID_CURSO->update($curso);

        return back()->with(['sucess' => 'Cliente Editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_CURSO)
    {
        $CURSO_DELETE = Curso::findOrFail($ID_CURSO);
        $CURSO_DELETE->delete($ID_CURSO);
        return back()->with(['sucess' => 'Curso Excluído com sucesso!']);
    }
}

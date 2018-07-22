<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 22/07/2018
 * Time: 12:17
 */
namespace App\Http\Controllers;
use App\Curso;
use App\Aluno;
use App\Professor;



use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexa($ID_ALUNO)
    {
        $aluno = Aluno::findOrFail($ID_ALUNO);
        $pdf = PDF::loadView('PdfAluno', compact('aluno'));
        return $pdf->download('aluno.pdf');
    }
    public function indexc($ID_CURSO)
    {
        $curso = Curso::findOrFail($ID_CURSO);
        $pdf = PDF::loadView('PdfCurso', compact('curso'));
        return $pdf->download('curso.pdf');
    }
    public function index($ID_PROFESSOR)
    {
        $professor = Professor::findOrFail($ID_PROFESSOR);
        $pdf = PDF::loadView('PdfProfessor', compact('professor'));
        return $pdf->download('professor.pdf');
    }
}

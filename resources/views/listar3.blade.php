<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:52
 */?>
<style>
    .table{
        margin-left: auto;
        margin-right: auto;
    }
    .barra {
        background-color: black;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
    }
</style>

<div class="barra"></br>

    <table>
        <tr>
            <td><form align = "left" action="{{url('/inicio') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Menu">
                    <input type="submit" value="Menu" class="btn btn-danger"></form></td><td></td><td></td><td></td><td></td>
            <td><form align = "left" action="{{url('/create_curso') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Adicionar Curso">
                    <input type="submit" value="Adicionar Curso" class="btn btn-danger"></form></td>
        </tr>

    </table>


    </br><h1 align="Center" >Cursos</h1>
</div></br></br></br>
</br></br></br></br></br></br>

<table class="table" border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Criação</th>
        <th colspan="4" >Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cursos as $curso)
        <tr>
            <td>{{$curso->ID_CURSO}}</td>
            <td>{{$curso->NOME}}</td>
            <td><?=date('d/m/Y', strtotime($curso->DATA_C))?></td>
            <td>
                <form action="{{url('/delete_curso', $curso->ID_CURSO)}}" method="post">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="delete">
                    <input type="submit" value="delete" class="btn btn-danger"></form>
            </td>
            <td><a href="{{url('/edit_curso', $curso->ID_CURSO)}}" class="btn btn-success">Editar</a></td>
            <td><a href="{{url('/pdfc', $curso->ID_CURSO)}}" class="btn btn-success">Gerar PDF</a></td>

            </td></tr>
    @endforeach
    </tbody>
</table>

<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:52
 */?>
@extends('layouts.app')
<style>
    .table{
        margin-left: auto;
        margin-right: auto;
    }
    .barra {
        background-color: brown;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
    }
</style>
<head>
    <title>Cursos Cadastrados</title>

</head>
<div class="barra">
    <table>
        <br>
        <tr>
            <td><form align = "left" action="{{url('/inicio') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Home">
                    <input type="submit" value="Home" class="btn btn-danger"></form></td><td></td><td></td><td></td><td></td>
            <td><form align = "left" action="{{url('/create2_aluno') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Novo Aluno">
                    <input type="submit" value="Novo Aluno" class="btn btn-danger"></form></td>
            <td><form align = "left" action="{{url('/create_professor') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Novo Professor">
                    <input type="submit" value="Novo Professor" class="btn btn-danger"></form></td>
            <td><form align = "left" action="{{url('/create3_curso') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Novo Curso">
                    <input type="submit" value="Novo Curso" class="btn btn-danger"></form></td>
            <td><form align = "right" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                    <input type="hidden" name="_method" Value="Sair">
                    <input type="submit" value="Sair" class="btn btn-danger"></form></td>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
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
            <td><a href="{{url('/edita2_curso', $curso->ID_CURSO)}}" class="btn btn-success">Editar</a></td>
            <td><a href="{{url('/PdfCurso', $curso->ID_CURSO)}}" class="btn btn-success">Gerar PDF</a></td>

            </td></tr>
    @endforeach
    </tbody>
</table>

<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:51
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

<div class="barra">
    <table>
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
            <a align = "right" href="{{ route('logout') }}"
               onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">SAIR</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </tr>

    </table>

    </br><h1 align="Center" >Alunos</h1>

</div></br></br></br>
</br></br></br></br></br></br>

<table class="table" border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>Logradouro</th>
        <th>Número</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Data de Criação</th>
        <th>CEP</th>
        <th colspan="4">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($alunos as $aluno)
        <tr>
            <td>{{$aluno->ID_ALUNO}}</td>
            <td>{{$aluno->nome}}</td>
            <td><?=date('d/m/Y', strtotime($aluno->datan))?></td>
            <td>{{$aluno->rua}}</td>
            <td>{{$aluno->numero}}</td>
            <td>{{$aluno->bairro}}</td>
            <td>{{$aluno->cidade}}</td>
            <td>{{$aluno->uf}}</td>
            <td><?=date('d/m/Y', strtotime($aluno->datac))?></td>
            <td>{{$aluno->cep}}</td>
            <td>
                <form action="{{url('/delete_aluno', $aluno->ID_ALUNO) }}" method="post">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE" class="btn btn-danger">
                    <input type="submit" value="Deletar" class="btn btn-danger"></form>
            </td>
            <td><a href="{{url('/edita_aluno', $aluno->ID_ALUNO)}}" class="btn btn-success">Editar</a></td>
            <td><a href="{{url('/pdfa', $aluno->ID_ALUNO)}}" class="btn btn-success">Gerar PDF</a></td>
            </td></tr>
    @endforeach
    </tbody>
</table>

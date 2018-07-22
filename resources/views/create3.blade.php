<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:40
 */
?>
@extends('layouts.app')
<style>
    body.center-form {
        min-height: 100vh;
    }

    div.center-form {
        position: relative;
        min-height: 100vh;
    }

    div.center-form > form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

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
</div>
<meta http-equiv="Content-Type" content="text/html;

charset=iso-8859-1" />
<title>Novo Curso</title>

</head>
<div class="container">
    @if(session('sucess'))
        <p class="alert-sucess">
            {{session('sucess')}}
        </p>
    @endif
    <table>
        <tr>
            <td><form align = "left" action="{{url('/inicio') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Menu">
                    <input type="submit" value="Menu" class="btn btn-danger"></form></td>
            <td><form align = "left" action="{{url('/mostrarc_curso') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Voltar">
                    <input type="submit" value="Voltar" class="btn btn-danger"></form></td>
        </tr>

    </table>

    <body class="center-form">
    <div class="center-form">


        <form method="post" action="{{url('/create3_curso')}}">
            {{csrf_field()}}
            <fieldset>
                <legend>Preencha com os Dados do Curso: </legend>

                <div class="linha">
                    <div class="form-group">
                        <label for="NOME">Nome: <br />
                            <input type="text" name= "NOME" id="NOME" placeholder="Digite o nome" size="40">
                    </div>
                    </label>
                </div>

                <div class="linha2">
                    <label for="DATA_C">Data da Criação: <br/>
                        <input type="text" name= "DATA_C" id="DATA_C" placeholder="dd/mm/aaaa" size="40">
                    </label>
                </div>
                </br>
                <div class="linha2">
                    <label><input name="Cadastrar" type="submit" id="Cadastrar" value="Cadastrar" />
                    </label>
                </div>

            </fieldset>
        </form>
    </body>

</html>

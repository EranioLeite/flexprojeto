<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:44
 >*/?>
<meta http-equiv="Content-Type" content="text/html;
@extends('layouts.app')
charset=iso-8859-1" />
<title>Edita Aluno</title>
<link href="estilo_form.css" rel="stylesheet"

      type="text/css" />
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
</head>

<div class="container">
    @if(session('sucess'))
        <p class="alert-sucess">
            {{session('sucess')}}
        </p>
        @endif
        </br></br>

        <body class="center-form">
        <div class="center-form">


            <form method="post" action="{{url('/edit_aluno', $aluno->ID_ALUNO)}}">
                {{csrf_field()}}
                <fieldset>
                    <legend>Edite os dados abaixo:</legend>

                    <div class="linha">
                        <div class="form-group">
                            <label for="nome">Nome: </br>
                                <input name="nome" type="text" id="nome" placeholder="Digite o nome" size="40" value="{{$aluno->nome}}"/></label><br />
                        </div>
                        </label>
                    </div>

                    <div class="linha2">
                        <label for="datan">Nascimento: <br/>
                            <input name="datan" type="text" id="datan" placeholder="dd/mm/aaaa" size="40"value="<?=date('d/m/Y', strtotime($aluno->datan))?>" /></label><br />
                        </label>
                    </div>

                    <div class="linha3">
                        <label for="cep">CEP: <br/>
                            <input name="cep" type="text" id="cep" placeholder="" size="40" value="{{$aluno->cep}}"/></label><br />
                        </label>
                    </div>

                    <div class="linha4">
                        <label for="rua">Logradouro: <br/>
                            <input name="rua" type="text" id="rua" placeholder="Digite a Rua" size="40" value="{{$aluno->rua}}"/></label><br />
                        </label>
                    </div>

                    <div class="linha5">
                        <label for="bairro">Bairro: <br/>
                            <input name="bairro" type="text" id="bairro" placeholder="Digite o Bairro" size="40" value="{{$aluno->bairro}}"/></label><br />
                        </label>
                    </div>

                    <div class="linha6">
                        <label for="cidade">Cidade: <br/>
                            <input name="cidade" type="text" id="cidade" placeholder="Digite a Cidade" size="40" value="{{$aluno->cidade}}"/></label><br />
                        </label>
                    </div>

                    <div class="linha7">
                        <label for="uf">Estado: <br/>
                            <input name="uf" type="text" id="uf" placeholder="Digite o Estado" size="40" value="{{$aluno->uf}}"/></label><br />
                        </label>
                    </div>

                    <div class="linha8">
                        <label for="numero">Número: <br/>
                            <input name="numero" type="text" id="número" placeholder="Digite o número" size="40" value="{{$aluno->numero}}"/></label><br />
                        </label>
                    </div>

                    <div class="linha9">
                        <label for="datac">Criação: <br/>
                            <input type="text" name= "datac" placeholder="dd/mm/aaaa" size="40" value="<?=date('d/m/Y', strtotime($aluno->datac))?>">
                        </label>
                    </div>
                    <div class="linha2">
                        <label><input name="Salvar" type="submit" id="Salvar" value="Salvar" />
                        </label>
                    </div>

                </fieldset>
            </form>

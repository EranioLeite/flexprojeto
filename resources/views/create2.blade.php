<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:38
 */?>
@extends('layouts.app') <!-- Fonts -->

<!-- Styles -->


<html>
<head>
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
    <title>Cadastro de Aluno</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
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
                        <input type="hidden" name="_method" Value="sair">
                        <input type="submit" value="sair" class="btn btn-danger"></form></td>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </tr>

        </table>
    </div>
    <meta http-equiv="Content-Type" content="text/html;

charset=iso-8859-1" />
    <title>Novo Aluno</title>

</head>
@if(session('success'))
    <p class="alert-success">
        {{session('success')}}
    </p>
@endif
</br></br></br>
<!-- Inicio do formulario -->



<body class="center-form">
<div class="center-form">


    <form method="post" action="{{url('/create2_aluno')}}">
        {{csrf_field()}}
        <fieldset>
            <legend>Preencha com os Dados do Aluno:</legend>

            <div class="linha">
                <div class="form-group">
                    <label for="nome">Nome: </br>
                        <input name="nome" type="text" id="nome" placeholder="Digite o nome" size="40"/></label>
                </div>
                </label>
            </div>

            <div class="linha2">
                <label for="datan">Nascimento: <br/>
                    <input name="datan" type="text" id="datan" placeholder="dd/mm/aaaa" size="40"/></label>
                </label>
            </div>

            <div class="linha3">
                <label for="cep">CEP: <br/>
                    <input name="cep" type="text" id="cep" value="" placeholder="" size="40"/></label>
                </label>
            </div>

            <div class="linha4">
                <label for="rua">Logradouro: <br/>
                    <input name="rua" type="text" id="rua" value="" placeholder="Nome da Rua" size="40"/></label>
                </label>
            </div>

            <div class="linha5">
                <label for="bairro">Bairro: <br/>
                    <input name="bairro" type="text" id="bairro" value="" placeholder="Nome do Bairro" size="40"/></label>
                </label>
            </div>

            <div class="linha6">
                <label for="cidade">Cidade: <br/>
                    <input name="cidade" type="text" id="cidade" value="" placeholder="Nome da Cidade" size="40"/></label>
                </label>
            </div>

            <div class="linha7">
                <label for="uf">Estado: <br/>
                    <input name="uf" type="text" id="uf" value="" placeholder="Nome do Estado" size="40"/></label>
                </label>
            </div>

            <div class="linha8">
                <label for="numero">Número: <br/>
                    <input name="numero" type="text" id="número" value="" placeholder="Número da casa" size="40"/></label>
                </label>
            </div>

            <div class="linha9">
                <label for="datac">Criação: <br/>
                    <input type="text" name= "datac" placeholder="dd/mm/aaaa" size="40">
                </label>
            </div>
            <div class="linha2">
                <label><input name="Cadastrar" type="submit" id="Cadastrar" value="Cadastrar" />
                </label>
            </div>

        </fieldset>
    </form>
</body>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</br></br></br>


</html>

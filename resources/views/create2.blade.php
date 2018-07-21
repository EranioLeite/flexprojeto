<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:38
 */?>
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
            background-color: black;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
        }
    </style>
    <title>CadAlunos</title>
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
    <div class="barra"></br></div>
    <meta http-equiv="Content-Type" content="text/html;

charset=iso-8859-1" />
    <title>Criando Alunos</title>
    <link href="estilo_form.css" rel="stylesheet"

          type="text/css" />

</head>
@if(session('success'))
    <p class="alert-success">
        {{session('success')}}
    </p>
@endif
<!-- Inicio do formulario -->



<body class="center-form">
<div class="center-form">


    <form method="post" action="{{url('/create_aluno')}}">
        {{csrf_field()}}
        <fieldset>
            <legend>Preencha os dados abaixo:</legend>

            <div class="linha">
                <div class="form-group">
                    <label for="nome">Nome: </br>
                        <input name="nome" type="text" id="nome" placeholder="Digite o nome" size="40"/></label><br />
                </div>
                </label>
            </div>

            <div class="linha2">
                <label for="datan">Nascimento: <br/>
                    <input name="datan" type="text" id="datan" placeholder="dd/mm/aaaa" size="40"/></label><br />
                </label>
            </div>

            <div class="linha3">
                <label for="cep">CEP: <br/>
                    <input name="cep" type="text" id="cep" value="" placeholder="" size="40"/></label><br />
                </label>
            </div>

            <div class="linha4">
                <label for="rua">Logradouro: <br/>
                    <input name="rua" type="text" id="rua" value="" placeholder="Digite a Rua" size="40"/></label><br />
                </label>
            </div>

            <div class="linha5">
                <label for="bairro">Bairro: <br/>
                    <input name="bairro" type="text" id="bairro" value="" placeholder="Digite o Bairro" size="40"/></label><br />
                </label>
            </div>

            <div class="linha6">
                <label for="cidade">Cidade: <br/>
                    <input name="cidade" type="text" id="cidade" value="" placeholder="Digite a Cidade" size="40"/></label><br />
                </label>
            </div>

            <div class="linha7">
                <label for="uf">Estado: <br/>
                    <input name="uf" type="text" id="uf" value="" placeholder="Digite o Estado" size="40"/></label><br />
                </label>
            </div>

            <div class="linha8">
                <label for="numero">Número: <br/>
                    <input name="numero" type="text" id="número" value="" placeholder="Digite o número" size="40"/></label><br />
                </label>
            </div>

            <div class="linha9">
                <label for="datac">Criação: <br/>
                    <input type="text" name= "datac" placeholder="dd/mm/aaaa" size="40">
                </label>
            </div>
            </br></br>
            <div class="linha2">
                <label><input name="Cadastrar" type="submit" id="Cadastrar" value="Cadastrar" />
                </label>
            </div>

        </fieldset>
    </form>
</body>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</br></br></br></br></br></br></br>

<table class="table" border = "1">
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
                <form action="{{url('/delete_aluno', $aluno->ID_ALUNO)}}" method="post">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="delete">
                    <input type="submit" value="delete" class="btn btn-danger">
            </td>
            <td><a href="{{url('/edit_aluno', $aluno->ID_ALUNO)}}" class="btn btn-success">Editar</a></td>
            <td><a href="{{url('/pdfa', $aluno->ID_ALUNO)}}" class="btn btn-success">Gerar PDF</a></td>
        </tr>
    @endforeach
    </tbody>
</table>


</html>

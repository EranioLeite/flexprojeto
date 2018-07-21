<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:13
 */
?>
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
<div class="barra"></br></div>
<meta http-equiv="Content-Type" content="text/html;

charset=iso-8859-1" />
<title>CadProfs</title>
<link href="estilo_form.css" rel="stylesheet"

      type="text/css" />
</head>

<div class="container">
    @if(session('sucess'))
        <p class="alert-sucess">
            {{session('sucess')}}
        </p>
        @endif
        </br></br></br>


        <body class="center-form">
        <div class="center-form">

            <form method="post" action="{{url('/create_professor')}}">
                {{csrf_field()}}
                <fieldset>
                    <legend>Preencha os dados abaixo:</legend>

                    <div class="linha">
                        <div class="form-group">
                            <label for="NOME"> Nome:</br>
                                <input type="text" name= "NOME" id="NOME" placeholder="Digite o nome" size="40">
                        </div>
                        </label>
                    </div>

                    <div class="linha2">
                        <label for="DATA_N">Nascimento: <br/>
                            <input type="text" name= "DATA_N" id="DATA_N" placeholder="dd/mm/aaaa" size="40">
                        </label>
                    </div>

                    <div class="linha3">
                        <label for="DATA_C">Data da Criação: <br/>
                            <input type="text" name= "DATA_C" id="DATA_C" placeholder="dd/mm/aaaa" size="40">
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


        <table class="table" border = "1">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Data de Nascimento</th>
                <th colspan="4">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($professores as $professor)
                <tr>
                    <td>{{$professor->ID_PROFESSOR}}</td>
                    <td>{{$professor->NOME}}</td>
                    <td><?=date('d/m/Y', strtotime($professor->DATA_C))?></td>
                    <td><?=date('d/m/Y', strtotime($professor->DATA_N))?></td>
                    <td>
                        <form action="{{url('/delete_professor', $professor->ID_PROFESSOR)}}" method="post">
                            {{ csrf_field()}}
                            <input type="hidden" name="_method" Value="delete">
                            <input type="submit" value="delete" class="btn btn-danger">
                    </td>
                    <td><a href="{{url('/edit_professor', $professor->ID_PROFESSOR)}}" class="btn btn-success">Editar</a></td>
                    <td><a href="{{url('/pdf', $professor->ID_PROFESSOR)}}" class="btn btn-success">Gerar PDF</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </body>
</div>

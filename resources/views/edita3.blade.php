<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:47
 */?>
<meta http-equiv="Content-Type" content="text/html;

charset=iso-8859-1" />
<title>EditProfs</title>
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
        background-color: black;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
    }
</style>
<div class="barra"></br><table>
        <tr>
            <td><form align = "left" action="{{url('/inicio') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Menu">
                    <input type="submit" value="Menu" class="btn btn-danger"></form></td>
            <td><form align = "left" action="{{url('/mostrar_professor') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Voltar">
                    <input type="submit" value="Voltar" class="btn btn-danger"></form></td>
        </tr>

    </table></div>

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


            <form method="post" action="{{url('/edit_professor', $professor->ID_PROFESSOR)}}">
                {{csrf_field()}}
                <fieldset>
                    <legend>Edite os dados abaixo:</legend>

                    <div class="linha">
                        <div class="form-group">
                            <label for="NOME">Nome: <br />
                                <input type="text" name= "NOME" id="NOME" placeholder="Digite o nome" size="40" value="{{$professor->NOME}}">
                        </div>
                        </label>
                    </div>

                    <div class="linha2">
                        <div class="form-group">
                            <label for="DATA_N">Nascimento: <br />
                                <input type="text" name= "DATA_N" id="DATA_N" placeholder="dd/mm/aaaa" size="40" value="<?=date('d/m/Y', strtotime($professor->DATA_N))?>">
                        </div>
                        </label>
                    </div>

                    <div class="linha3">
                        <label for="DATA_C">Data da Criação: <br/>
                            <input type="text" name= "DATA_C" id="DATA_C" placeholder="dd/mm/aaaa" size="40" value="<?=date('d/m/Y', strtotime($professor->DATA_C))?>">
                        </label>
                    </div>
                    </br></br>
                    <div class="linha2">
                        <label><input name="Salvar" type="submit" id="Salvar" value="Salvar" />
                        </label>
                    </div> </form>

            </fieldset>

        </div>

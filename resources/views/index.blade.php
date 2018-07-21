<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 12:02
 */?>
<style>
    .barra {
        background-color: black;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
    }
</style>
<div class="barra"></div></br></br></br>

<a align = "right" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">SAIR</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>


<div class="site-index">

    <div class="jumbotron">
        </br></br></br>
        <h1 align="center">Bem vindo ao Portal da Escola</h1>

        <p align="center" class="lead">Aqui o secretário da escola pode lançar as notas dos alunos e acompanhar sua situação</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <html>
                <head>
                    <title>Portal Escola</title>
                </head>
                <body>
                </br></br></br></br></br></br>
                <Table align = "center">
                    <tr>
                        <td align ="center"><p><a href="{{url('/listar1_aluno')}}"/>
                            <center><img src="student.png" width="120" height="75"/></p>
                                 <a href="{{url('/listar1_aluno')}}"><h3>+ Alunos</h3></center>

                        <td align ="center"><p><a href="{{url('/listar3_curso')}}"/>
                            <center><img src="curso.png" width="300" height="150"/></p>
                                 <a href="{{url('/listar3_curso')}}"><h3>+ Cursos</h3></center>

                        <td align ="center"><a href="{{url('/listar_professor')}}"/>
                            <center><img src="teacher.png" width="120" height="75"/></p>
                                <a href="{{url('/listar_professor')}}"><h3>+ Professores</h3></center>
                    </tr>
                </Table>
                </body>
                </html>
            </div>
        </div>

    </div>
</div>

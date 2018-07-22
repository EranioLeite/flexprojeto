<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 12:02
 */?>
<!-- Fonts -->


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
@extends('layouts.app')
<div class="barra">
    <table>
       <br>
        <tr>
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
</div></br></br></br>

<div class="site-index">

    <div class="jumbotron">


                <html>
                <head>
                    <title>Portal Escola</title>

                </head>
                <body>
                </br></br></br></br></br></br>
                <Table align = "center">
                    <tr>
                        <td align ="center"><a href="{{url('/listar1_aluno')}}"/>
                            <center><img src="aluno.png" width="250" height="145"/></p>
                            <div href="{{url('/listar1_aluno')}}"><h3>Alunos</h3></center>
                            </div></>
                        <td align ="center"><a href="{{url('/listar_professor')}}"/>
                            <center><img src="professor.png" width="250" height="145"/></p>
                                <a href="{{url('/listar_professor')}}"><h3>Professores</h3></center>

                        <td align ="center"><p><a href="{{url('/listar3_curso')}}"/>
                            <center><img src="curso.png" width="250" height="125"/></p>
                            <a href="{{url('/listar3_curso')}}"><h3>Cursos</h3></center>
                    </tr>
                </Table>
                </body>
                </html>
            </div>
</div>


<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 13:49
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $primaryKey = 'ID_ALUNO';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'datan',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'numero',
        'uf',
        'datac'
    ];
    protected $table = "aluno";
}

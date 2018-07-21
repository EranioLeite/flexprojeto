<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 13:50
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'ID_CURSO';
    public $timestamps = false;
    protected $fillable = [
        'NOME',
        'DATA_C'
    ];
    protected $table = "curso";
}

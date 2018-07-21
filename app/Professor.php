<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 14:18
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $primaryKey = 'ID_PROFESSOR';
    public $timestamps = false;
    protected $fillable = [
        'NOME',
        'DATA_N',
        'DATA_C'
    ];
    protected $table = "professor";
}

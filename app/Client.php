<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const ESTADOS_CIVIS = [
    	1=>'Solteiro',
    	2=>'Casado',
    	3=>'Divorciado'
    ];
    
    const PESSOA_FISICA = 'fisica';
    const PESSOA_JURIDICA = 'juridica';
    
    protected $fillable = [
    	'nome',
    	'documento',
    	'email',
    	'telefone',
    	'inadimplente',
    	'data_nasc',
    	'sexo',
    	'estado_civil',
    	'deficiencia_fisica'
    ];
}

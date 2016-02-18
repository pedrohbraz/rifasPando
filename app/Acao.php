<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Acao extends Model
{
  //Usar o softDeletes na tabela Acaos
    //Acoes nao serao deletadas, mas sim marcadas como deletadas
   use SoftDeletes;

    protected $dates = ['deleted_at'];

    //Relacionamentos

    //Uma acao possui varias rifas
    public function rifa()
    {
    	return $this->hasMany('App\Rifa');
    }

    //Uma acao pertence a um usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    //Uma acao possui 0 ou mais mensagens
    public function mensagem()
    {
    	return $this->hasMany('App\Mensagem');
    }

  }

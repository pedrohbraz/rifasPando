<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
  //Relacionamentos

    //Uma mensagem pertence a um usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    //Uma mensagem sempre e relacionada a uma acao
    public function acao()
    {
    	return $this->belongsTo('App\Acao');
    }
}

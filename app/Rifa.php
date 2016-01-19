<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
  //Relacionamentos

    //Uma rifa pertence a um usuario
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	//Uma rifa pertence a uma acao
	public function acao()
	{
		return $this->belongsTo('App\Acao');
	}

}

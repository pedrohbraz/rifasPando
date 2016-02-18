<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rifa extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
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

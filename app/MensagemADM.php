<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagemADM extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

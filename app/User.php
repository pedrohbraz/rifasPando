<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
  use EntrustUserTrait;
  //Usar o softDeletes na tabela users
    //Usuarios nao serao deletados, mas sim marcados como deletados
    //use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password', 'telefone','endereco',

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    //Relacionamentos

    //Um usuario pode  ter varias acoes
    public function acao()
    {
        return $this->hasMany('App\Acao');
    }

    //Um usuario pode escrever varias mensagens
    public function mensagem()
    {
        return $this->hasMany('App\Mensagem');
    }

    //Um usuario ADM pode escrever varias mensagens administrativas
    public function mensagemADM()
    {
        return $this->hasMany('App\MensagemADM');
    }

    //Um usuario pode ter varias rifas (compradas)
    public function rifa()
    {
        return $this->hasMany('App\Rifa');

    }
}

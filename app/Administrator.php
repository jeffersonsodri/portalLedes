<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
    protected $table = 'administrators';

    protected $fillable = [
        'permission', 'user_id', 'adm_id' 
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function administrado_supervisor()
    {
        return $this->belongsTo('App\Administrador');
    }

}

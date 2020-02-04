<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Editor extends Authenticatable
{

    protected $table = 'editors';


    protected $fillable = [
        'permission', 'user_id',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}

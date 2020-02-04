<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
     

    protected $table = 'members';

    protected $fillable = [
        'course','description', 'photo', 'people_id',
    ];


}

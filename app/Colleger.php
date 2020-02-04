<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Bosistas
 */
class Colleger extends Model
{
    protected $table = 'collegers';

    protected $fillable = [
        'member_id', 
    ];
}

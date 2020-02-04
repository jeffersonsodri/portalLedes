<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model do Sobre Nós
 */
class AboutUs extends Model
{

    protected $table = 'about_us';

    protected $fillable = [
        'description', 'image'
    ];
}

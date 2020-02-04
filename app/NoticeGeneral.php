<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeGeneral extends Model
{
    protected $table = 'notices_general';


    protected $fillable = [
        'notice_id', 'update_at',
    ];
}

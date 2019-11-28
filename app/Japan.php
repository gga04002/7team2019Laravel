<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Japan extends Model
{
    protected $fillable = [
        'img', 'place', 'explain'
    ];

    // 2019-11-28 User와 관계 삭제
}

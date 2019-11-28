<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'address', 'phone_number', 'mottoes'
    ];

    // 2019-11-28 User와의 관계 삭제
}

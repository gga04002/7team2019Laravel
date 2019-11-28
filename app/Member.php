<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_email', 'user_name', 'admin', 'address', 'phone_number', 'mottoes'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

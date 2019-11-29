<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Japan extends Model
{
    protected $fillable = [
        'img', 'place', 'explain', 'admin'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

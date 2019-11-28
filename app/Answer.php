<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'a_id', 'user_email', 'user_name', 'admin', 'target_id'
    ];

    public function question() {
        return $this->hasMany(Answer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

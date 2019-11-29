<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        // 'a_id', 'user_email', 'user_name', 'admin', 'target_id'
        'a_id', 'target_id', 'title', 'content'
    ];

    public function question() {
        return $this->hasOne(Question::class);
    }

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}

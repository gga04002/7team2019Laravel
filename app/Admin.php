<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $guarded = 'admin';
    // $guard가 아니고 $guarded
    // MassAssignment(대량할당)을 막기 위한 방법 두가지
    // 1) $fillable => 허용목록(whitelist)
    // 2) $guarded  => 금지목록(blacklist)

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }
}

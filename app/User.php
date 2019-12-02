<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // $casts : 모델에서 데이터 조회 시 자동으로 타입 변환(캐스팅)할 목록

    public function admin(){
        return $this->hasOne(Admin::class);
        // 1:1 => hasOne()
        // 1:n => 1: hasMany(), n: belongsTo()
        // n:n => belongsToMany()
    }

    // User모델에서 member() 라는 메서드를 썼다 == Member모델과 관계가 있다
    // == 누구 한 놈이 다른 한놈을 참조하는 외래키를 가지고 있다
    // users테이블 <--참조-- members테이블
    // members테이블에 user_id라는 외래키가 존재하게 됨
    public function member() {
        return $this->hasOne(Member::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}

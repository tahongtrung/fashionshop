<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','loainguoidung_id','visa'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isOwner(){
        return ($this->loainguoidung_id == 1);
    }
    public function isAdmin(){
        return ($this->loainguoidung_id == 3);
    }
    public function isUser(){
        return ($this->loainguoidung_id == 2);
    }
}

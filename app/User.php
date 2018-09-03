<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function userType(){
        return $this->belongsTo(UserType::class);
    }

    public function isSecretario(){
        return $this->userType->id == UserType::SECRETARIO;
    }

    public function isSuperintendente(){
        return $this->userType->id == UserType::SUPERINTENDENTE;
    }

    public function isDiretor(){
        return $this->userType->id == UserType::DIRETOR;
    }

    public function isZelador(){
        return $this->userType->id == UserType::ZELADOR;
    }



}

<?php

namespace ArticulosReligiosos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'paternal_surname', 'maternal_surname', 'email', 'password', 'rfc', 'phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function domicile(){
        return $this->hasOne('ArticulosReligiosos\Domicile');
    }

    public function sales(){
        return $this->hasMany('ArticulosReligiosos\Sale');
    }

    public function comments(){
        return $this->hasMany('ArticulosReligiosos\Comment');
    }

    public function replies(){
        return $this->hasMany('ArticulosReligiosos\Replie');
    }
}

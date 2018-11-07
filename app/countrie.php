<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    protected $fillable = [
        'name',
    ];

    public function states(){
        return $this->hasMany('ArticulosReligiosos\State');
    }
}

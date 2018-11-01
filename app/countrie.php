<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    //
    public function states(){
        return $this->hasMany('ArticulosReligiosos\State');
    }
}

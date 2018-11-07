<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
    ];

    public function countrie() {
    	return $this->belongsTo('ArticulosReligiosos\Countrie');
    }

    public function domiciles(){
        return $this->hasMany('ArticulosReligiosos\Domicile');
    }
}

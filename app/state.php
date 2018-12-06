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

    public function cities(){
        return $this->hasMany('ArticulosReligiosos\City');
    }
}

<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
	/**
    * Get the route key for the model.
    *
    * @return string
    */
    
    protected $fillable = [
        'name',
    ];

    public function states(){
        return $this->hasMany('ArticulosReligiosos\State');
    }
}

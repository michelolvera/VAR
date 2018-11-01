<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    //
    public function categorie() {
    	return $this->belongsTo('ArticulosReligiosos\Categories');
    }

    public function products(){
    	return $this->hasMany('ArticulosReligiosos\Product');
    }
}

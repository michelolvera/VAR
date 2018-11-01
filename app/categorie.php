<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    public function subcategories(){
        return $this->hasMany('ArticulosReligiosos\Subcategorie');
    }

    public function products(){
        return $this->hasMany('ArticulosReligiosos\Product');
    }
}

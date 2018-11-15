<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];
    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function categorie() {
    	return $this->belongsTo('ArticulosReligiosos\Categorie');
    }

    public function products(){
    	return $this->hasMany('ArticulosReligiosos\Product');
    }
}

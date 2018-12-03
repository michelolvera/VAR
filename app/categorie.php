<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name', 'icon', 'css_color', 'slug',
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

    public function subcategories(){
        return $this->hasMany('ArticulosReligiosos\Subcategorie');
    }

    public function products()
    {
        return $this->hasManyThrough('ArticulosReligiosos\Product', 'ArticulosReligiosos\Subcategorie');
    }
}

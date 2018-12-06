<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'shipping_cost'
    ];

    public function state()
    {
        return $this->belongsTo('ArticulosReligiosos\State');
    }

    public function domcitiiciles(){
        return $this->hasMany('ArticulosReligiosos\Domicile');
    }
}

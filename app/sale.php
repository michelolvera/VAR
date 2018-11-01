<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    public function user() {
    	return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function products()
    {
        return $this->belongsToMany('ArticulosReligiosos\Product');
    }
}

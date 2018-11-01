<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function state()
    {
        return $this->belongsTo('ArticulosReligiosos\State');
    }
}

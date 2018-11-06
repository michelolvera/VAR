<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{
    //
    protected $fillable = [
        'address_number', 'street', 'between_streets', 'neighborhood', 'zip_code', 'city',
    ];
    public function user()
    {
        return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function state()
    {
        return $this->belongsTo('ArticulosReligiosos\State');
    }
}

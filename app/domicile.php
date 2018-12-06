<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{
    //
    protected $fillable = [
        'address_number', 'street', 'between_streets', 'neighborhood', 'zip_code',
    ];
    public function user()
    {
        return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function city()
    {
        return $this->belongsTo('ArticulosReligiosos\City');
    }
}

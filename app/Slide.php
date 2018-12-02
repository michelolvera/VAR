<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title', 'text', 'redirect'
    ];
}

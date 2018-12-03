<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Replie extends Model
{
    protected $fillable = [
        'text',
    ];

    public function user() {
    	return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function comment() {
    	return $this->belongsTo('ArticulosReligiosos\Comment');
    }
}
